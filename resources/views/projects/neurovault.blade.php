<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>NeuroVault — Brian Hinga</title>
        <meta name="description" content="NeuroVault: a ground-up rebuild of a legacy CodeIgniter 3 POS system into a Laravel 13 REST API with a React 18/TypeScript frontend.">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=space-grotesk:500,600,700|inter:400,500,600|jetbrains-mono:400,500" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[var(--color-bg)] text-white antialiased">

        <div class="fixed inset-0 wallpaper-layer pointer-events-none z-0"></div>
        <div class="fixed inset-0 grain-overlay pointer-events-none z-0"></div>
        <div class="fixed top-0 left-1/2 -translate-x-1/2 w-[900px] h-[600px] pointer-events-none z-0"
             style="background: radial-gradient(ellipse at center, rgba(70,116,52,0.06), transparent 70%);"></div>

        <div class="relative z-10">

            <header class="fixed top-0 inset-x-0 z-50 glass-nav">
                <nav class="max-w-4xl mx-auto px-6 h-16 flex items-center justify-between">
                    <a href="{{ url('/') }}" class="font-mono text-sm text-white/90 tracking-tight">
                        <span class="text-[var(--color-tangerine)]">~</span>/brian-hinga
                    </a>
                    <a href="{{ url('/#projects') }}" class="font-mono text-[13px] text-white/60 hover:text-white transition-colors">&larr; all projects</a>
                </nav>
            </header>

            <article class="max-w-4xl mx-auto px-6 pt-32 pb-24">

                <div class="flex items-center gap-3 mb-6">
                    <span class="font-mono text-xs px-2.5 py-1 rounded-full" style="background: rgba(70,116,52,0.18); color: var(--color-leaf);">in progress</span>
                    <span class="font-mono text-xs text-white/40">started June 2026</span>
                </div>

                <h1 class="font-display font-semibold text-4xl sm:text-5xl mb-6 text-balance">NeuroVault</h1>
                <p class="text-xl text-white/70 leading-relaxed max-w-2xl mb-10 text-balance">
                    A ground-up rebuild of Terra Softworks' flagship POS system &mdash; from a legacy
                    CodeIgniter 3 codebase into a Laravel 13 REST API with a React 18/TypeScript frontend.
                </p>

                <div class="flex flex-wrap gap-2 mb-16">
                    @foreach (['Laravel 13', 'React 18', 'TypeScript', 'Sanctum', 'Spatie RBAC', 'MySQL', 'Zustand'] as $tag)
                        <span class="font-mono text-xs px-2.5 py-1 rounded border text-white/50" style="border-color: rgba(255,255,255,0.12);">{{ $tag }}</span>
                    @endforeach
                </div>

                {{-- Why rebuild --}}
                <section class="mb-16">
                    <div class="font-mono text-sm text-[var(--color-tangerine)] mb-4">// the problem</div>
                    <p class="text-white/70 leading-relaxed">
                        The company's live POS ran on CodeIgniter 3 &mdash; functional, but past the point where
                        adding features safely was straightforward. Rather than keep extending it, I'm leading
                        a full rebuild onto a Laravel 13 REST API with a decoupled React/TypeScript frontend,
                        while the legacy system keeps running production in parallel.
                    </p>
                </section>

                {{-- Architecture --}}
                <section class="mb-16">
                    <div class="font-mono text-sm text-[var(--color-tangerine)] mb-4">// architecture</div>
                    <ul class="space-y-4 text-white/70 leading-relaxed">
                        <li class="flex gap-3">
                            <span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">71 Eloquent models, 110+ REST endpoints</span> mapping the
                            full legacy schema, with role-based access control via Sanctum + Spatie Permissions.</span>
                        </li>
                        <li class="flex gap-3">
                            <span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">A standalone Books lookup service</span>, authenticated by
                            SHA-256 hashed API keys, deliberately decoupled from the core POS database as its own
                            external-facing product surface.</span>
                        </li>
                        <li class="flex gap-3">
                            <span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">A controller audit methodology</span>: for each of the 17
                            controllers, describe every table it writes to and diff that against the code's insert
                            arrays. This process alone has surfaced and fixed several silent production
                            data-integrity bugs &mdash; columns being inserted that don't exist, NOT NULL columns
                            being omitted, and one controller referencing a table that was never migrated.</span>
                        </li>
                        <li class="flex gap-3">
                            <span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">An isolated test database</span> seeded from production-scale
                            data (80k products, 68k sales), with transactional test isolation and custom
                            authentication traits for role-based scenarios.</span>
                        </li>
                    </ul>
                </section>

                {{-- Performance --}}
                <section class="mb-16">
                    <div class="font-mono text-sm text-[var(--color-tangerine)] mb-4">// performance</div>
                    <div class="glass-card rounded-xl p-6 font-mono text-sm">
                        <div class="text-white/40 mb-3">$ product search &mdash; 1.26M row table</div>
                        <div class="mb-1" style="color: var(--color-tangerine);">&minus; leading-wildcard LIKE queries, full table scans</div>
                        <div style="color: var(--color-leaf);">+ MySQL full-text search index</div>
                        <div class="mt-4 text-white/40 mb-3">$ dashboard &amp; reporting endpoints</div>
                        <div style="color: var(--color-leaf);">+ response caching, 60&ndash;300s TTL</div>
                    </div>
                    <p class="text-white/50 text-sm mt-4">
                        Exact before/after timings are pending a clean benchmark run once the migration is further
                        along &mdash; will update with real numbers.
                    </p>
                </section>

                {{-- Frontend --}}
                <section class="mb-16">
                    <div class="font-mono text-sm text-[var(--color-tangerine)] mb-4">// frontend</div>
                    <p class="text-white/70 leading-relaxed">
                        The React/TypeScript client includes a POS terminal with client-side cart state managed by
                        Zustand, a barcode-driven ISBN lookup with external API fallback, in-app notifications,
                        and role-aware navigation that adapts to what a given staff member is permitted to do.
                    </p>
                </section>

                <div class="rounded-lg p-6 border text-center" style="border-color: rgba(255,255,255,0.08); background: rgba(255,255,255,0.02);">
                    <p class="font-mono text-sm text-white/40">
                        Screenshots of the POS terminal and dashboard UI coming soon &mdash; the project is still
                        under active development.
                    </p>
                </div>

            </article>

            <footer class="px-6 py-8 border-t" style="border-color: rgba(255,255,255,0.06);">
                <div class="max-w-4xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4 font-mono text-xs text-white/30">
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
