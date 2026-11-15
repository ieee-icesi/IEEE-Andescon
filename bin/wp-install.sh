#!/usr/bin/env bash
#
# Boots the local WordPress stack and leaves the ANDESCON theme active.
# Idempotent: safe to re-run.
#
set -euo pipefail

cd "$(dirname "${BASH_SOURCE[0]}")/.."

if [ ! -f .env ]; then
	cp .env.example .env
	echo "==> .env created from .env.example"
fi

set -a
# shellcheck disable=SC1091
. ./.env
set +a

WP_PORT="${WP_PORT:-8080}"
SITE_URL="http://localhost:${WP_PORT}"

echo "==> Starting db + wordpress on ${SITE_URL}"
docker compose up -d db wordpress

echo "==> Waiting for wp-config.php inside the container"
for _ in $(seq 1 90); do
	if docker compose exec -T wordpress test -f wp-config.php 2>/dev/null; then
		break
	fi
	sleep 2
done

echo "==> Waiting for HTTP"
for _ in $(seq 1 90); do
	if curl -fsS -o /dev/null "${SITE_URL}/wp-login.php" 2>/dev/null; then
		break
	fi
	sleep 2
done

if docker compose run --rm wpcli wp core is-installed >/dev/null 2>&1; then
	echo "==> WordPress already installed, skipping core install"
else
	echo "==> Installing WordPress"
	docker compose run --rm wpcli wp core install \
		--url="${SITE_URL}" \
		--title="${WP_TITLE:-IEEE ANDESCON}" \
		--admin_user="${WP_ADMIN_USER:-admin}" \
		--admin_password="${WP_ADMIN_PASSWORD:-admin}" \
		--admin_email="${WP_ADMIN_EMAIL:-admin@example.com}" \
		--skip-email
fi

echo "==> Activating andescon-theme"
docker compose run --rm wpcli wp theme activate andescon-theme

echo "==> Setting site basics"
# Keep the address in the DB in sync with WP_PORT, otherwise changing the port
# leaves WordPress redirecting to the old one.
docker compose run --rm wpcli wp option update home "${SITE_URL}" >/dev/null
docker compose run --rm wpcli wp option update siteurl "${SITE_URL}" >/dev/null
docker compose run --rm wpcli wp rewrite structure '/%postname%/' >/dev/null

# Only fill the tagline when it is still the WordPress default, so a manual
# change is never clobbered by re-running this script.
current_tagline=$(docker compose run --rm wpcli wp option get blogdescription 2>/dev/null || true)
case "${current_tagline}" in
	''|'Just another WordPress site'|'Sitio en construccion')
		docker compose run --rm wpcli wp option update blogdescription "Engineering a connected future" >/dev/null
		;;
	*) echo "==> Keeping existing tagline: ${current_tagline}" ;;
esac

# Dev only: let the container user (www-data, uid 33) write to uploads.
# uploads/ is gitignored, so this never touches tracked files.
chmod -R a+rwX wp-content/uploads

echo
echo "==> Done."
echo "    Site:  ${SITE_URL}"
echo "    Admin: ${SITE_URL}/wp-admin  (${WP_ADMIN_USER:-admin} / ${WP_ADMIN_PASSWORD:-admin})"
