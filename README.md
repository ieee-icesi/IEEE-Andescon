# IEEE Andescon — WordPress theme

WordPress site for IEEE ANDESCON 2027 (Cali, Colombia). The repo tracks **only
the theme**; WordPress core and the database run in Docker and are never
committed.

The landing page is rendered entirely by PHP. `assets/js/main.js` holds
behaviour only — it opens dialogs, switches program tabs and toggles the mobile
menu, but no copy and no markup.

## Quick path — from clone to running site

```bash
git clone <repo> && cd IEEE-Andescon
cp .env.example .env        # optional: defaults work as-is
./bin/wp-install.sh         # first run: ~1-2 min (pulls images, installs WP)
```

Then open <http://localhost:8080>. Admin: <http://localhost:8080/wp-admin>,
`admin` / `admin`.

Check that everything survived the trip:

```bash
./bin/smoke.sh              # 20 checks, exits non-zero on any failure
```

Expected output ends with `20/20 checks passed`.

## What to look at

| Page | What it proves |
|------|----------------|
| <http://localhost:8080> | The full landing page: hero, 9 tracks, program, registration, committee, travel, partners, contact |
| Click any track card | A per-track `<dialog>` opens with real server-rendered content |
| Program tabs (Day 01/02/03) | All three days are in the HTML; JS only toggles visibility |
| Resize below 900 px | Mobile menu, with the label swapping to "Close" via CSS, not JS |
| <http://localhost:8080/wp-admin> | Standard WordPress admin |

## Details

| Topic | Decision |
|-------|----------|
| Content | Every string lives in `inc/data.php`, one function per block. Templates only loop over those arrays. |
| Markup | Rendered by PHP. The published template built the track grid, program and dialogs in JavaScript; none of that remains. |
| Images | WebP, 644 KB total (was 3.5 MB). Intrinsic `width`/`height` kept for layout stability. |
| Preview banner | Rendered only when `wp_get_environment_type() !== 'production'`. Override with `define( 'ANDESCON_PREVIEW_BANNER', true/false )`. |
| Navigation | Hard-coded in `andescon_navigation()` — the design depends on the exact dropdown markup. A `primary` menu location is registered for later use. |
| Environment | `WP_ENVIRONMENT_TYPE=local` is set once in `docker-compose.yml` (YAML anchor) and shared by the web and CLI containers. |
| Fonts | DM Sans + Libre Caslon Display from Google Fonts, enqueued with `preconnect` (not an `@import`). |

### Layout

```
wp-content/themes/andescon-theme/
├── style.css              ← theme header only
├── functions.php          ← setup, enqueue, hooks
├── header.php footer.php  ← document shell, preview banner, nav, dialogs
├── front-page.php         ← assembles the landing page
├── index.php              ← fallback for non-front requests
├── inc/
│   ├── data.php           ← ALL copy and content arrays
│   └── template-tags.php  ← andescon_asset(), andescon_anchor(), andescon_icon()…
├── template-parts/        ← one file per page section (12)
└── assets/
    ├── css/main.css
    ├── js/main.js         ← behaviour only
    └── img/*.webp
```

## Verification — what was actually measured

Checked against the published static template, not eyeballed:

- **Geometry**: 30 elements, identical position and size at 1440 / 768 / 390 px.
  Document height 8136 px on both.
- **Pixels**: 0 differing pixels before the WebP conversion; afterwards 1.02 %
  differ, and every one of those pixels falls inside the logo or hero
  illustration. Nothing outside an image region changed.
- **Images**: 4/4 decode at the expected rendered size (576×150, 760×316,
  1440×570, 589×650).
- **PHP**: `php -l` clean on 19/19 files, no `debug.log` entries.
- **Behaviour**: 22 interaction checks — dialog open/close, native Escape,
  focus return, tab switching, arrow keys, mobile menu, dropdown, banner.

Re-run the first, third and last of those with `./bin/smoke.sh` and the site
itself; the pixel and geometry comparisons need the original template and
Chrome, and were one-off.

## Editing content

Open `inc/data.php`. Each block is one function:

```php
andescon_tracks()               // 9 research tracks (title, summary, topics, icon)
andescon_agenda()               // 3 days × 4 sessions
andescon_milestones()           // submission dates
andescon_registration_tiers()   // authors / attendees / students
andescon_committee()
andescon_partners()
andescon_navigation()
andescon_dialogs()              // 5 content dialogs
andescon_author_steps()
andescon_travel_topics()
```

Change a value, save, reload. Theme files are bind-mounted — no rebuild, no
cache to clear.

When the real conference content is confirmed, these functions are the single
seam to replace with CPTs or an options page.

## Daily use

```bash
docker compose up -d          # start
docker compose logs -f wordpress
docker compose down           # stop, data kept
docker compose down -v        # stop and wipe DB + core volume

docker compose run --rm wpcli wp plugin list
docker compose run --rm wpcli wp theme list
docker compose run --rm wpcli wp option update blogname "IEEE ANDESCON 2027"
```

### How the mounts work

| Mount | Contents |
|-------|----------|
| `wp_data:/var/www/html` | WordPress core + generated `wp-config.php` |
| `./wp-content:/var/www/html/wp-content` | Your code, live-edited from the host |
| `db_data:/var/lib/mysql` | MySQL data |

On the very first boot the official image seeds the named volume from its own
image, dropping the bundled themes/plugins into the host `wp-content/`. They
are gitignored and harmless.

## Troubleshooting

**`./bin/smoke.sh` fails with "container not running"**
Start the stack: `docker compose up -d`, wait for the DB healthcheck, retry.

**Port 8080 already in use**
Set `WP_PORT=8081` in `.env`, run `./bin/wp-install.sh` again (it re-syncs the
stored site URL), then `WP_PORT=8081 ./bin/smoke.sh`.

**Blank page or 500**
`docker compose logs -f wordpress`. If core was wiped, re-run
`./bin/wp-install.sh` — it reinstalls and reactivates the theme idempotently.

**Images look unstyled / hero collapsed**
`main.css` must end with `img{height:auto}`. Without it the intrinsic
`width`/`height` attributes become fixed heights and the hero grows ~411 px.

**Start over completely**
`docker compose down -v && ./bin/wp-install.sh`.

## Environment

- WordPress 7.1.x, PHP 8.3, MySQL 8.0 (container versions)
- Theme targets PHP 8.0+ (`declare( strict_types = 1 )`)
- Docker only — no local PHP, MySQL or WP-CLI required
