#!/usr/bin/env bash
# Exports the portfolio as static HTML for Cloudflare.
# Builds assets, renders every route through `php artisan serve`, strips the
# local server's origin from URLs, and writes the result to
# ../hinga-dev-static/static_export (or the folder given as $1).
# The previous export is kept as <folder>.prev until the next run.
#
#   bash scripts/export-static.sh
set -euo pipefail
cd "$(dirname "$0")/.."

OUT="${1:-../hinga-dev-static/static_export}"
PORT=8765
ROUTES=("/" "/projects/apex" "/projects/neurovault" "/projects/half-priced-books")
# one detail page per Half Priced Books work item
while IFS= read -r slug; do ROUTES+=("/projects/half-priced-books/$slug"); done < <(
  python3 -c 'import json; [print(i["slug"]) for i in json.load(open("resources/data/half-priced-books.json"))["items"]]'
)

rm -f public/hot            # a stale hot file makes @vite() point at a dead dev server
npm run build

php artisan serve --port="$PORT" >/tmp/hinga-export-serve.log 2>&1 &
SERVER=$!
trap 'kill "$SERVER" 2>/dev/null || true' EXIT
for _ in $(seq 1 40); do
  curl -sf -o /dev/null "http://127.0.0.1:$PORT/" && break
  sleep 0.25
done

TMP="$(mktemp -d)"
for r in "${ROUTES[@]}"; do
  dir="$TMP${r%/}"
  mkdir -p "$dir"
  curl -sf "http://127.0.0.1:$PORT$r" -o "$dir/index.html" || { echo "✗ failed to render $r (see /tmp/hinga-export-serve.log)"; exit 1; }
done

# asset() and url() render absolute URLs for the local server; make them root-relative.
grep -rlE "(127\.0\.0\.1|localhost):$PORT" "$TMP" | xargs -r sed -i -E "s#https?://(127\.0\.0\.1|localhost):$PORT##g"
if grep -rqE "127\.0\.0\.1|localhost" "$TMP"; then
  echo "✗ a localhost URL is still in the export:"; grep -rnoE ".{0,40}(127\.0\.0\.1|localhost).{0,40}" "$TMP" | head
  exit 1
fi

cp -r public/build "$TMP/build"
cp -r public/images "$TMP/images"

rm -rf "$OUT.prev"
[ -d "$OUT" ] && mv "$OUT" "$OUT.prev"
mkdir -p "$(dirname "$OUT")"
mv "$TMP" "$OUT"
echo "✓ exported ${#ROUTES[@]} pages to $OUT (previous export kept in $OUT.prev)"
echo "  Next: upload the contents of $OUT in the Cloudflare dashboard."
