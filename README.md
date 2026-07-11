# hinga-dev

My personal portfolio site — built with Laravel, styled as a dark, developer-focused
"smoked glass" interface rather than a generic template.

## Stack

- **Backend:** Laravel 12
- **Frontend:** Blade + Tailwind CSS v4, Vite 7
- **Testing:** Pest 4
- **PHP:** ^8.2

## Pages

- **`/`** — Hero, About, a 4-project grid (NeuroVault, Half Priced Books, APEX,
  hinga-dev itself), Skills, Contact
- **`/projects/neurovault`** — Architecture writeup and performance notes for an
  in-progress Laravel 13 + React/TypeScript POS rebuild
- **`/projects/half-priced-books`** — Three case studies from a live e-commerce +
  POS platform: a 1.46-billion-row SQL bug, a JavaScript object-key ordering bug,
  and an end-to-end M-Pesa e-voucher flow
- **`/projects/apex`** — Overview and screenshot gallery of a live multi-sport
  data dashboard

## Design system

- **Palette:** Sea Grey `#363636` (primary), Leaf Green `#467434` (secondary),
  Tangerine `#F58F20` (accent), near-black `#1F1F1F` page background
- **Type:** Space Grotesk (display), Inter (body), JetBrains Mono (labels/accents)
- **Texture:** a dense, low-opacity dev-doodle wallpaper (PHP, Laravel, React,
  Docker, MySQL, security-tooling icons) as a background layer
- **Glass system:** dark, translucent "smoked glass" cards — `backdrop-filter`
  blur, subtle borders, a soft tangerine-tinted hover lift — plus a faint SVG
  grain overlay for texture depth. Buttons and status badges stay solid, never glass.
- **Section labels** follow a filesystem convention (`~/about`, `~/projects`,
  `~/skills`, `~/contact`) rather than numbered markers.

## Getting started

```bash
git clone https://github.com/redfang854/Hingabuilds.git
cd Hingabuilds

composer install
npm install

cp .env.example .env
php artisan key:generate

npm run dev       # in one terminal
php artisan serve # in another
```

Visit `http://127.0.0.1:8000`.

## Notes

- Sessions and cache run on the `file` driver — no database required to run
  the site locally.
- All project content reflects real work: NeuroVault (in progress), Half Priced
  Books (live production platform), and APEX (personal project, live on Vercel
  at [sports-dashboard-redfang.vercel.app](https://sports-dashboard-redfang.vercel.app)).

## Author

**Brian Hinga Njoroge**
[GitHub](https://github.com/redfang854) · hingabayo@gmail.com · Nairobi, Kenya
