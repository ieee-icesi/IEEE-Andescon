#!/usr/bin/env bash
#
# Smoke test for the local ANDESCON stack.
# Usage: ./bin/smoke.sh [--skip-lint]
#
# Exits 0 when every check passes, 1 otherwise.
#
set -uo pipefail

cd "$(dirname "${BASH_SOURCE[0]}")/.."

THEME='wp-content/themes/andescon-theme'
SKIP_LINT="${1:-}"

if [ -f .env ]; then
	set -a
	# shellcheck disable=SC1091
	. ./.env
	set +a
fi

WP_PORT="${WP_PORT:-8080}"
BASE="http://localhost:${WP_PORT}"

pass=0
fail=0

ok() {
	pass=$(( pass + 1 ))
	printf '  \033[32mPASS\033[0m  %s\n' "$1"
}

ko() {
	fail=$(( fail + 1 ))
	printf '  \033[31mFAIL\033[0m  %s\n' "$1"
	[ -n "${2:-}" ] && printf '        %s\n' "$2"
}

check_eq() { # label expected actual
	if [ "$2" = "$3" ]; then ok "$1 ($3)"; else ko "$1" "expected $2, got $3"; fi
}

echo "==> ANDESCON smoke test on ${BASE}"
echo

# ---------------------------------------------------------------- 1. HTTP
code=$(curl -s -o /tmp/andescon-home.html -w '%{http_code}' "${BASE}/" || echo 000)
check_eq "homepage responds 200" "200" "$code"

if [ ! -s /tmp/andescon-home.html ]; then
	echo "  cannot continue without a homepage"
	exit 1
fi

body=$(cat /tmp/andescon-home.html)

# ------------------------------------------------------- 2. rendered content
count() { printf '%s' "$body" | grep -o "$1" | wc -l | tr -d ' '; }

check_eq "11 dialogs (9 tracks + 2)"       "11" "$(count '<dialog id="dialog-')"
check_eq "4 important dates on home"       "4"  "$(count '<h4>')"
check_eq "5 top-level nav items"           "5"  "$(printf '%s' "$body" | sed -n '/<nav id="navigation"/,/<\/nav>/p' | grep -cE '<div class="dropdown|<a href="[^"]*"( aria-current="page")?>[A-Za-z ]+</a>')"

if grep -q 'class="hero-banner"' <<<"$body"; then ok "hero banner present"; else ko "hero banner present"; fi
if grep -q 'id="contact"' <<<"$body"; then ok "contact footer present"; else ko "contact footer present"; fi

# Inner pages: heavy sections live here, not on the front page.
page() { curl -s "${BASE}/$1/"; }
pcount() { printf '%s' "$1" | grep -o "$2" | wc -l | tr -d ' '; }
authors=$(page authors); program=$(page program); attend=$(page attend); committee=$(page committee)
check_eq "authors: 9 research track cards" "9" "$(pcount "$authors" 'class="track" data-dialog')"
check_eq "authors: submission guide"       "1" "$(pcount "$authors" 'id="submission"')"
check_eq "program: 3 program days"         "3" "$(pcount "$program" 'class="program-day"')"
check_eq "attend: 3 registration tiers"    "3" "$(pcount "$attend" 'data-dialog="registration"')"
check_eq "attend: travel section"          "1" "$(pcount "$attend" 'id="travel"')"
check_eq "attend: 11 discover cards"       "11" "$(pcount "$attend" 'class="discover-card"')"
check_eq "committee: section"              "1" "$(pcount "$committee" 'id="committee"')"

# --------------------------------------------------------- 3. no PHP errors
errors=$(printf '%s' "$body" | grep -cE 'Fatal error|Parse error|Warning:|Notice:|Deprecated:|Undefined')
check_eq "no PHP errors leaked into HTML" "0" "$errors"

# ------------------------------------------------------------ 4. static assets
for asset in \
	assets/css/main.css \
	assets/js/main.js \
	assets/img/logo.webp \
	assets/img/cali-illustration.webp \
	assets/img/cali.webp \
	assets/img/ermita.webp; do

	c=$(curl -s -o /dev/null -w '%{http_code}' "${BASE}/wp-content/themes/andescon-theme/${asset}")
	check_eq "asset ${asset##*/}" "200" "$c"
done

# ---------------------------------------------------------------- 5. weight
total=$(du -sk "$THEME/assets/img" | cut -f1)
if [ "$total" -lt 1024 ]; then
	ok "image payload ${total} KB (budget 1024 KB)"
else
	ko "image payload ${total} KB" "over the 1024 KB budget"
fi

# ----------------------------------------------------------------- 6. php lint
if [ "$SKIP_LINT" = "--skip-lint" ]; then
	echo "  SKIP  php -l (requested)"
elif ! docker compose ps --status running --services 2>/dev/null | grep -qx wordpress; then
	echo "  SKIP  php -l (container not running)"
else
	lint_fail=0
	lint_total=0
	while IFS= read -r f; do
		lint_total=$(( lint_total + 1 ))
		out=$(docker compose exec -T wordpress php -l "/var/www/html/${THEME}/${f}" < /dev/null 2>&1)
		case "$out" in
			*"No syntax errors"*) ;;
			*) lint_fail=$(( lint_fail + 1 )); printf '        %s: %s\n' "$f" "$out" ;;
		esac
	done < <(cd "$THEME" && find . -name '*.php' | sed 's|^\./||' | sort)

	check_eq "php -l clean on ${lint_total} files" "0" "$lint_fail"
fi

# ----------------------------------------------------------------- 7. debug log
if docker compose ps --status running --services 2>/dev/null | grep -qx wordpress; then
	if docker compose exec -T wordpress test -f /var/www/html/wp-content/debug.log < /dev/null 2>/dev/null; then
		n=$(docker compose exec -T wordpress sh -c 'wc -l < /var/www/html/wp-content/debug.log' < /dev/null 2>/dev/null | tr -d ' ')
		if [ "${n:-0}" = "0" ]; then
			ok "debug.log empty"
		else
			ko "debug.log has ${n} lines" "$(docker compose exec -T wordpress tail -n 3 /var/www/html/wp-content/debug.log < /dev/null 2>/dev/null)"
		fi
	else
		ok "no debug.log written"
	fi
fi

# ------------------------------------------------------------------- summary
echo
if [ "$fail" -eq 0 ]; then
	printf '\033[32m%s/%s checks passed\033[0m\n' "$pass" "$(( pass + fail ))"
	printf 'Open %s\n' "$BASE"
	exit 0
fi

printf '\033[31m%s/%s checks passed, %s failed\033[0m\n' "$pass" "$(( pass + fail ))" "$fail"
exit 1
