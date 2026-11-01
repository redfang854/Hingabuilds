<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Half Priced Books — Brian Hinga</title>
        <meta name="description" content="What I built, fixed, documented and designed on the live e-commerce storefront and in-store POS for Half Priced Books, plus the tools I used to do it.">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=space-grotesk:500,600,700|inter:400,500,600|jetbrains-mono:400,500" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[var(--color-bg)] text-white antialiased overflow-x-hidden">

        <div class="fixed inset-0 wallpaper-layer pointer-events-none z-0" style="background-image: url('{{ asset('images/doodle-wallpaper.webp') }}');"></div>
        <div class="fixed inset-0 grain-overlay pointer-events-none z-0"></div>
        <div class="fixed top-0 left-1/2 -translate-x-1/2 w-[900px] h-[600px] pointer-events-none z-0"
             style="background: radial-gradient(ellipse at center, rgba(245,143,32,0.08), transparent 70%);"></div>

        <div class="relative z-10">

            <header class="fixed top-0 inset-x-0 z-50 glass-nav">
                <nav class="w-full px-6 sm:px-10 h-16 flex items-center justify-between">
                    <a href="{{ url('/') }}" class="font-mono text-sm text-white/90 tracking-tight">
                        <span class="text-[var(--color-tangerine)]">~</span>/brian-hinga
                    </a>
                    <a href="{{ url('/#projects') }}" class="font-mono text-[13px] text-white/60 hover:text-white transition-colors">&larr; all projects</a>
                </nav>
            </header>

            <article class="max-w-[1600px] mx-auto px-6 pt-24 sm:pt-32 pb-12 sm:pb-24">

                <div class="flex flex-wrap items-center gap-x-3 gap-y-2 mb-6">
                    <span class="font-mono text-xs px-2.5 py-1 rounded-full whitespace-nowrap" style="background: rgba(245,143,32,0.15); color: var(--color-tangerine);">live in production</span>
                    <span class="font-mono text-xs text-white/40">May 2025 &mdash; present &middot; Terra Softworks Limited</span>
                </div>

                <h1 class="font-display font-semibold text-4xl sm:text-5xl mb-6 text-balance">Half Priced Books</h1>
                <p class="text-base sm:text-xl text-white/70 leading-relaxed max-w-3xl mb-8 sm:mb-10 sm:text-balance">
                    A Nairobi bookseller's online shop (Laravel 10) and the till system its branches use
                    (CodeIgniter 3), sharing one catalogue of 72,000+ products. I joined as an intern and am now a
                    junior engineer on both systems. Everything I've worked on is listed below. Click any item for
                    the full write-up.
                </p>

                <div class="flex flex-wrap gap-2 mb-10 sm:mb-12">
                    @foreach (['Laravel 10', 'CodeIgniter 3', 'PHP 5.6 → 8.x', 'MySQL 8', 'jQuery / DataTables', 'M-Pesa Daraja', 'PHPUnit', 'GitHub Actions', 'Laravel Queues', 'DigitalOcean'] as $tag)
                        <span class="font-mono text-xs px-2.5 py-1 rounded border text-white/50" style="border-color: rgba(255,255,255,0.12);">{{ $tag }}</span>
                    @endforeach
                </div>

                {{-- At a glance --}}
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 mb-12 sm:mb-20">
                    @foreach ([
                        ['2', 'live codebases: storefront + POS, one shared database', 'tangerine'],
                        ['28', 'pieces of work listed below, from features and fixes to architecture', 'tangerine'],
                        ['153', 'automated tests across 4 CI workflows, where there were none', 'leaf'],
                        ['11 + 60', 'system documents + page-level references for an undocumented POS', 'leaf'],
                    ] as [$n, $label, $c])
                        <div class="glass-card rounded-xl p-4 sm:p-5">
                            <div class="font-display font-semibold text-2xl sm:text-3xl mb-1" style="color: var(--color-{{ $c }});">{{ $n }}</div>
                            <div class="text-[13px] sm:text-xs sm:font-mono leading-snug text-white/50">{{ $label }}</div>
                        </div>
                    @endforeach
                </div>

                {{-- All work --}}
                <section class="mb-12 sm:mb-20">
                    <div class="flex items-baseline justify-between mb-6 sm:mb-8 gap-x-4 gap-y-1 flex-wrap">
                        <h2 class="font-display font-semibold text-2xl text-white/90">The work</h2>
                        <span class="font-mono text-xs text-white/30">{{ count($items) }} items &middot; click any to read more</span>
                    </div>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-x-10 gap-y-9 sm:gap-y-12">
                        @foreach ($groups as $group)
                            <div>
                                <div class="font-mono text-xs text-white/30 mb-4">{{ strtolower($group) }}</div>
                                <ul class="text-sm leading-relaxed space-y-3">
                                    @foreach ($items->where('group', $group) as $item)
                                        <li>
                                            <a href="{{ route('projects.half-priced-books.show', $item['slug']) }}" class="group flex gap-2 text-white/65 hover:text-white transition-colors">
                                                <span class="text-white/30 group-hover:text-[var(--color-tangerine)] transition-colors">&mdash;</span>
                                                <span>
                                                    {{-- last word stays on the same line as the status badge --}}
                                                    {{ \Illuminate\Support\Str::contains($item['title'], ' ') ? \Illuminate\Support\Str::beforeLast($item['title'], ' ') : '' }}
                                                    <span class="whitespace-nowrap">{{ \Illuminate\Support\Str::afterLast($item['title'], ' ') }}@if ($item['status'] !== 'shipped')<span class="font-mono text-[10px] ml-1.5 px-1.5 py-0.5 rounded align-middle" style="background: rgba(255,255,255,0.06); color: rgba(255,255,255,0.45);">{{ $item['status'] }}</span>@endif<span class="inline-block ml-1 opacity-0 group-hover:opacity-100 transition-opacity" style="color: var(--color-tangerine);">&rarr;</span></span>
                                                </span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </section>

                {{-- Toolkit --}}
                <section class="mb-4">
                    <h2 class="font-display font-semibold text-xl sm:text-2xl text-white/90 mb-2 sm:mb-8">Toolkit &mdash; what I used it for here</h2>
                    <p class="sm:hidden font-mono text-xs text-white/30 mb-4">tap a tool to see what I used it for</p>
                    @php $toolkit = [
                            ['Laravel 10', 'Service-layer refactors (PosService), queued jobs and listeners, a second database connection to the POS, Daraja integration, feature tests over HTTP.'],
                            ['CodeIgniter 3', 'Day-to-day work in a large legacy MVC codebase: controllers, models, libraries, hooks. Traced every page in it end to end for the documentation.'],
                            ['PHP 5.6 → 8.x', 'Code that runs on both versions; fixes for language features removed in PHP 7 and 8; polyfills where an extension is gone.'],
                            ['MySQL 8', 'Query profiling, join rewrites, batched IN-queries, transactions, NOT NULL / constraint debugging, data repair, schema design for V2.'],
                            ['JavaScript / jQuery / DataTables', 'POS cart state, localStorage-based baskets, object-key ordering, cache-busting, fixing a view that loaded 72k rows into the browser.'],
                            ['M-Pesa Daraja', 'STK Push for orders, e-vouchers and the till; callback handling and routing between systems; local callback testing through ngrok.'],
                            ['PHPUnit', 'Unit and feature suites in Laravel and CodeIgniter 3; tests always run against a separate test database, never live data.'],
                            ['GitHub Actions', 'Four CI workflows that start MySQL 8.0 for each run and gate every merge on unit and feature tests.'],
                            ['Git & GitHub', 'Feature branch to pull request to senior review; one change per commit, with Problem / Where / Fix commit messages.'],
                            ['Python', 'Patch scripts that only apply an edit when the target text appears exactly once, with backups; scripted large-file and report generation.'],
                            ['Docker', 'MySQL 8.4 container running next to the system MySQL 8.0, for V2 development.'],
                            ['Technical writing', 'Weekly technical reports to the CTO, plain-English client reports, and the 70+ document POS reference (pandoc / LaTeX).'],
                    ]; @endphp

                    {{-- Mobile: collapsible list --}}
                    <div class="sm:hidden glass-card rounded-xl divide-y divide-white/[0.06]">
                        @foreach ($toolkit as [$tool, $use])
                            <details class="group px-4">
                                <summary class="flex items-center justify-between gap-3 py-3.5 cursor-pointer list-none [&::-webkit-details-marker]:hidden">
                                    <span class="font-mono text-sm text-white/90">{{ $tool }}</span>
                                    <span class="text-white/30 text-lg leading-none transition-transform group-open:rotate-45">+</span>
                                </summary>
                                <p class="text-white/60 text-sm leading-relaxed pb-4">{{ $use }}</p>
                            </details>
                        @endforeach
                    </div>

                    {{-- Tablet / desktop: card grid (unchanged) --}}
                    <div class="hidden sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                        @foreach ($toolkit as [$tool, $use])
                            <div class="glass-card rounded-xl p-5">
                                <div class="font-mono text-sm text-white mb-2">{{ $tool }}</div>
                                <p class="text-white/60 text-sm leading-relaxed">{{ $use }}</p>
                            </div>
                        @endforeach
                    </div>
                </section>

            </article>

            <footer class="px-6 py-8 border-t" style="border-color: rgba(255,255,255,0.06);">
                <div class="max-w-[1600px] mx-auto flex flex-col sm:flex-row items-center justify-between gap-4 font-mono text-xs text-white/30">
                    <span>&copy; {{ date('Y') }} Brian Hinga Njoroge</span>
                    <div class="flex items-center gap-6">
                        <a href="https://github.com/redfang854" target="_blank" rel="noopener" class="hover:text-white/60 transition-colors">github</a>
                        <a href="mailto:hingabayo@gmail.com" class="hover:text-white/60 transition-colors">email</a>
                    </div>
                </div>
            </footer>

        </div>
    </body>
</html>
