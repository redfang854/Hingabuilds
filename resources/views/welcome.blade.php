<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Brian Hinga — Full-Stack Engineer</title>
        <meta name="description" content="Brian Hinga Njoroge — Full-stack software engineer specialising in Laravel and React/TypeScript, with a background in Information Security. Based in Nairobi, Kenya.">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=space-grotesk:500,600,700|inter:400,500,600|jetbrains-mono:400,500" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[var(--color-bg)] text-white antialiased">

        {{-- Fixed doodle wallpaper texture layer --}}
        <div class="fixed inset-0 wallpaper-layer pointer-events-none z-0" style="background-image: url('{{ asset('images/doodle-wallpaper.webp') }}');"></div>
        <div class="fixed inset-0 grain-overlay pointer-events-none z-0"></div>

        {{-- Ambient accent glow, kept subtle --}}
        <div class="fixed top-0 left-1/2 -translate-x-1/2 w-[900px] h-[600px] pointer-events-none z-0"
             style="background: radial-gradient(ellipse at center, rgba(70,116,52,0.06), transparent 70%);"></div>

        <div class="relative z-10">

            {{-- ============ NAV ============ --}}
            <header class="fixed top-0 inset-x-0 z-50 glass-nav">
                <nav class="max-w-[1600px] mx-auto px-6 h-16 flex items-center justify-between">
                    <a href="#top" class="font-mono text-sm text-white/90 tracking-tight">
                        <span class="text-[var(--color-tangerine)]">~</span>/brian-hinga
                    </a>
                    <div class="hidden md:flex items-center gap-8 font-mono text-[13px] text-white/60">
                        <a href="#about" class="hover:text-white transition-colors">about</a>
                        <a href="#projects" class="hover:text-white transition-colors">projects</a>
                        <a href="#skills" class="hover:text-white transition-colors">skills</a>
                        <a href="#contact" class="hover:text-white transition-colors">contact</a>
                    </div>
                    <a href="mailto:hingabayo@gmail.com"
                       class="font-mono text-[13px] px-4 py-2 rounded border transition-colors"
                       style="border-color: var(--color-tangerine); color: var(--color-tangerine);">
                        get in touch
                    </a>
                </nav>
            </header>

            {{-- ============ HERO ============ --}}
            <section id="top" class="min-h-screen flex items-center px-6 pt-16">
                <div class="max-w-[1600px] mx-auto w-full py-20">
                <div class="glass-hero rounded-3xl p-8 sm:p-12 grid lg:grid-cols-5 gap-12 items-center">

                    <div class="lg:col-span-3">
                        <div class="font-mono text-sm text-[var(--color-leaf)] mb-6 flex items-center gap-2">
                            <span class="inline-block w-2 h-2 rounded-full" style="background: var(--color-leaf); box-shadow: 0 0 8px var(--color-leaf);"></span>
                            available for opportunities
                        </div>

                        <div class="font-mono text-base sm:text-lg text-white/50 mb-4">
                            brian@terra-softworks:~$ whoami
                        </div>

                        <h1 class="font-display font-semibold text-5xl sm:text-6xl lg:text-7xl leading-[1.05] text-balance mb-6">
                            Brian Hinga Njoroge
                        </h1>

                        <p class="text-lg sm:text-xl text-white/70 max-w-2xl leading-relaxed mb-10 text-balance">
                            Full-stack software engineer building production systems in
                            Laravel and React/TypeScript,
                            holding a
                            <button type="button" onclick="openDegreeModal()"
                                class="font-bold hover:text-[var(--color-tangerine)] transition-colors cursor-pointer">Bachelor of Science in Information Security and Forensics</button>.
                            Currently rebuilding a live commercial POS platform from the ground up.
                        </p>

                        <div class="flex flex-wrap items-center gap-4">
                            <a href="#projects"
                               class="font-mono text-sm px-6 py-3 rounded font-medium transition-colors"
                               style="background: var(--color-tangerine); color: #1f1f1f;"
                               onmouseover="this.style.background='var(--color-tangerine-hover)'"
                               onmouseout="this.style.background='var(--color-tangerine)'">
                                view projects &rarr;
                            </a>
                            <a href="https://github.com/redfang854" target="_blank" rel="noopener"
                               class="font-mono text-sm px-6 py-3 rounded border text-white/80 hover:text-white transition-colors"
                               style="border-color: rgba(255,255,255,0.18);">
                                github.com/redfang854
                            </a>
                        </div>

                        <div class="mt-20 font-mono text-xs text-white/30 flex flex-wrap gap-x-8 gap-y-2">
                            <span>nairobi, kenya</span>
                            <span>bsc information security &amp; forensics — kca university</span>
                            <span>junior software engineer @ terra softworks</span>
                            <a href="tel:+254797250532" class="hover:text-white/60 transition-colors">+254 797 250 532</a>
                            <a href="mailto:hingabayo@gmail.com" class="hover:text-white/60 transition-colors">hingabayo@gmail.com</a>
                        </div>
                    </div>

                    <div class="lg:col-span-2 flex justify-center lg:justify-end">
                        <div class="relative w-full max-w-sm">
                            <div class="absolute inset-0 rounded-2xl" style="background: radial-gradient(ellipse at center, rgba(245,143,32,0.15), transparent 70%); filter: blur(24px);"></div>
                            <img src="/images/profile.webp" alt="Brian Hinga Njoroge"
                                 class="relative w-full rounded-2xl border"
                                 style="border-color: rgba(255,255,255,0.1);">
                        </div>
                    </div>

                </div>
                </div>
                </div>
            </section>

            {{-- ============ ABOUT ============ --}}
            <section id="about" class="px-6 py-24 border-t scroll-mt-16" style="border-color: rgba(255,255,255,0.06);">
                <div class="max-w-[1600px] mx-auto">
                    <div class="font-mono text-sm text-[var(--color-tangerine)] mb-8">~/about</div>

                    <div class="grid lg:grid-cols-5 gap-12">
                        <div class="lg:col-span-3">
                            <p class="text-xl sm:text-2xl leading-relaxed text-white/85 text-balance font-display font-medium">
                                I split my time between shipping features on a live e-commerce and POS platform,
                                and leading a ground-up rebuild of that same system into a modern Laravel and
                                React stack.
                            </p>
                            <p class="mt-6 text-white/60 leading-relaxed max-w-xl">
                                My background is in Information Security and Forensics, which shapes how I
                                approach everything downstream of it &mdash; authentication, API design, data
                                integrity, and the instinct to trace a bug all the way back to its root cause
                                rather than patch the symptom. Promoted from intern to Junior Software Engineer
                                in eight months on the strength of production features shipped independently.
                            </p>
                        </div>

                        <div class="glass-card lg:col-span-2 rounded-xl p-6 font-mono text-sm">
                            <div class="text-white/40 mb-4">// currently</div>
                            <ul class="space-y-3 text-white/70">
                                <li class="flex gap-3">
                                    <span style="color: var(--color-leaf);">&gt;</span>
                                    Leading the NeuroVault rebuild &mdash; Laravel 13 REST API + React 18/TypeScript
                                </li>
                                <li class="flex gap-3">
                                    <span style="color: var(--color-leaf);">&gt;</span>
                                    Maintaining a live production POS &amp; e-commerce platform
                                </li>
                                <li class="flex gap-3">
                                    <span style="color: var(--color-leaf);">&gt;</span>
                                    Based in Nairobi, working primarily on Ubuntu Linux
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ============ PROJECTS ============ --}}
            <section id="projects" class="px-6 py-24 border-t scroll-mt-16" style="border-color: rgba(255,255,255,0.06);">
                <div class="max-w-[1600px] mx-auto">
                    <div class="font-mono text-sm text-[var(--color-tangerine)] mb-2">~/projects</div>
                    <h2 class="font-display font-semibold text-3xl sm:text-4xl mb-12">Selected work</h2>

                    <div class="grid md:grid-cols-2 gap-6">

                        {{-- NeuroVault --}}
                        <div class="glass-card rounded-xl p-7 flex flex-col relative overflow-hidden">
                            <div class="flex items-center justify-between mb-4">
                                <span class="font-mono text-xs px-2.5 py-1 rounded-full" style="background: rgba(70,116,52,0.18); color: var(--color-leaf);">in progress</span>
                                <span class="font-mono text-xs text-white/30">01 &mdash; flagship rebuild</span>
                            </div>
                            <h3 class="font-display font-semibold text-2xl mb-3">NeuroVault</h3>
                            <p class="text-white/65 leading-relaxed mb-5">
                                Ground-up rebuild of a legacy CodeIgniter 3 POS system into a Laravel 13 REST API
                                with a React 18/TypeScript frontend &mdash; 71 Eloquent models, 110+ endpoints, and
                                RBAC via Sanctum + Spatie Permissions.
                            </p>
                            <div class="rounded-md p-4 mb-5 font-mono text-xs" style="background: rgba(0,0,0,0.2);">
                                <div class="text-white/40 mb-2">// query performance, 1.26M-row product table</div>
                                <div style="color: var(--color-leaf);">+ full-text search index, replacing leading-wildcard LIKE</div>
                                <div style="color: var(--color-leaf);">+ caching layer, 60&ndash;300s TTL on reporting endpoints</div>
                            </div>
                            <div class="flex flex-wrap gap-2 mb-6">
                                @foreach (['Laravel 13', 'React 18', 'TypeScript', 'Sanctum', 'MySQL'] as $tag)
                                    <span class="font-mono text-xs px-2.5 py-1 rounded border text-white/50" style="border-color: rgba(255,255,255,0.12);">{{ $tag }}</span>
                                @endforeach
                            </div>
                            <div class="mt-auto">
                                <a href="{{ route('projects.neurovault') }}" class="font-mono text-sm inline-flex items-center gap-2 transition-colors" style="color: var(--color-tangerine);">
                                    read the write-up &rarr;
                                </a>
                            </div>
                        </div>

                        {{-- Half Priced Books --}}
                        <div class="glass-card rounded-xl p-7 flex flex-col relative overflow-hidden">
                            <div class="flex items-center justify-between mb-4">
                                <span class="font-mono text-xs px-2.5 py-1 rounded-full" style="background: rgba(245,143,32,0.15); color: var(--color-tangerine);">live in production</span>
                                <span class="font-mono text-xs text-white/30">02 &mdash; e-commerce &amp; pos</span>
                            </div>
                            <h3 class="font-display font-semibold text-2xl mb-3">Half Priced Books</h3>
                            <p class="text-white/65 leading-relaxed mb-5">
                                Main developer on a live e-commerce storefront and in-store POS, from feature
                                scoping through production deployment &mdash; including payments, inventory, and
                                a few production disasters found and fixed.
                            </p>
                            <div class="rounded-md p-4 mb-5 font-mono text-xs" style="background: rgba(0,0,0,0.2);">
                                <div class="text-white/40 mb-2">// SQL OR-join bug, deals &amp; listing queries</div>
                                <div style="color: var(--color-tangerine);">&minus; ~1.46 billion row comparisons per request</div>
                                <div style="color: var(--color-leaf);">+ rewritten join logic, found via query profiling</div>
                            </div>
                            <div class="flex flex-wrap gap-2 mb-6">
                                @foreach (['Laravel', 'CodeIgniter 3', 'MySQL', 'M-Pesa Daraja', 'PHPUnit'] as $tag)
                                    <span class="font-mono text-xs px-2.5 py-1 rounded border text-white/50" style="border-color: rgba(255,255,255,0.12);">{{ $tag }}</span>
                                @endforeach
                            </div>
                            <div class="mt-auto">
                                <a href="{{ route('projects.half-priced-books') }}" class="font-mono text-sm inline-flex items-center gap-2 transition-colors" style="color: var(--color-tangerine);">
                                    read the case studies &rarr;
                                </a>
                            </div>
                        </div>

                        {{-- APEX --}}
                        <div class="glass-card rounded-xl p-7 flex flex-col relative overflow-hidden">
                            <div class="flex items-center justify-between mb-4">
                                <span class="font-mono text-xs px-2.5 py-1 rounded-full" style="background: rgba(70,116,52,0.18); color: var(--color-leaf);">live</span>
                                <span class="font-mono text-xs text-white/30">03 &mdash; personal project</span>
                            </div>
                            <h3 class="font-display font-semibold text-2xl mb-3">APEX</h3>
                            <p class="text-white/65 leading-relaxed mb-5">
                                A multi-sport data dashboard covering six sports with live API integrations,
                                a 79,000+ match historical database, and AI-generated driver bios. Built,
                                deployed, and maintained solo.
                            </p>
                            <div class="rounded-md p-4 mb-5 font-mono text-xs" style="background: rgba(0,0,0,0.2);">
                                <div class="text-white/40 mb-2">// historical data layer, neon postgresql</div>
                                <div style="color: var(--color-leaf);">+ 52,649 football matches &middot; 26,380 F1 results</div>
                            </div>
                            <div class="flex flex-wrap gap-2 mb-6">
                                @foreach (['React', 'Vite', 'Neon Postgres', 'Supabase', 'Groq API'] as $tag)
                                    <span class="font-mono text-xs px-2.5 py-1 rounded border text-white/50" style="border-color: rgba(255,255,255,0.12);">{{ $tag }}</span>
                                @endforeach
                            </div>
                            <div class="mt-auto">
                                <a href="{{ route('projects.apex') }}" class="font-mono text-sm inline-flex items-center gap-2 transition-colors" style="color: var(--color-tangerine);">
                                    see it in action &rarr;
                                </a>
                            </div>
                        </div>

                        {{-- hinga-dev --}}
                        <div class="glass-card rounded-xl p-7 flex flex-col relative overflow-hidden">
                            <div class="flex items-center justify-between mb-4">
                                <span class="font-mono text-xs px-2.5 py-1 rounded-full" style="background: rgba(245,143,32,0.15); color: var(--color-tangerine);">this site</span>
                                <span class="font-mono text-xs text-white/30">04 &mdash; meta</span>
                            </div>
                            <h3 class="font-display font-semibold text-2xl mb-3">hinga-dev</h3>
                            <p class="text-white/65 leading-relaxed mb-5">
                                This portfolio itself &mdash; a Laravel 12 site with a custom design system:
                                a Sea Grey / Leaf Green / Tangerine palette, a low-opacity dev-doodle texture
                                layer, and a filesystem-inspired section structure.
                            </p>
                            <div class="flex flex-wrap gap-2 mb-6">
                                @foreach (['Laravel 12', 'Tailwind v4', 'Vite 7'] as $tag)
                                    <span class="font-mono text-xs px-2.5 py-1 rounded border text-white/50" style="border-color: rgba(255,255,255,0.12);">{{ $tag }}</span>
                                @endforeach
                            </div>
                            <div class="mt-auto">
                                <span class="font-mono text-sm text-white/40">you're looking at it</span>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            {{-- ============ SKILLS ============ --}}
            <section id="skills" class="px-6 py-24 border-t scroll-mt-16" style="border-color: rgba(255,255,255,0.06);">
                <div class="max-w-[1600px] mx-auto">
                    <div class="font-mono text-sm text-[var(--color-tangerine)] mb-2">~/skills</div>
                    <h2 class="font-display font-semibold text-3xl sm:text-4xl mb-12">Toolbox</h2>

                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-x-10 gap-y-8">
                        @php
                            $skillGroups = [
                                'Languages' => ['PHP 8', 'TypeScript', 'JavaScript (ES6+)', 'SQL', 'Python'],
                                'Backend' => ['Laravel 10/13', 'REST API design', 'Sanctum', 'Spatie RBAC', 'PHPUnit'],
                                'Frontend' => ['React 18', 'Vite', 'Zustand', 'Blade'],
                                'Database' => ['MySQL', 'Schema design', 'Indexing', 'Full-text search'],
                                'DevOps' => ['Git', 'GitHub Actions', 'DBeaver', 'Linux (Ubuntu)'],
                                'Security' => ['Pen-testing fundamentals', 'Digital forensics', 'Network security'],
                            ];
                        @endphp

                        @foreach ($skillGroups as $group => $items)
                            <div>
                                <div class="font-mono text-xs text-white/40 mb-3">{{ $group }}</div>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($items as $item)
                                        <span class="text-sm px-3 py-1.5 rounded border text-white/75" style="border-color: rgba(255,255,255,0.1); background: rgba(255,255,255,0.03);">{{ $item }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            {{-- ============ CONTACT / FOOTER ============ --}}
            <section id="contact" class="px-6 py-24 border-t scroll-mt-16" style="border-color: rgba(255,255,255,0.06);">
                <div class="max-w-[1600px] mx-auto text-center">
                    <div class="font-mono text-sm text-[var(--color-tangerine)] mb-4">~/contact</div>
                    <h2 class="font-display font-semibold text-3xl sm:text-5xl mb-6 text-balance">
                        Let's build something that has to work.
                    </h2>
                    <p class="text-white/60 max-w-xl mx-auto mb-10">
                        Open to new opportunities. The fastest way to reach me is email.
                    </p>
                    <div class="flex flex-wrap items-center justify-center gap-4">
                        <a href="mailto:hingabayo@gmail.com"
                           class="font-mono text-base px-8 py-4 rounded inline-block font-medium transition-colors"
                           style="background: var(--color-tangerine); color: #1f1f1f;"
                           onmouseover="this.style.background='var(--color-tangerine-hover)'"
                           onmouseout="this.style.background='var(--color-tangerine)'">
                            hingabayo@gmail.com
                        </a>
                        <a href="tel:+254797250532"
                           class="font-mono text-base px-8 py-4 rounded inline-block font-medium text-white/80 hover:text-white border transition-colors"
                           style="border-color: rgba(255,255,255,0.18);">
                            +254 797 250 532
                        </a>
                        <a href="https://www.linkedin.com/in/brian-hinga-9608ab364/" target="_blank" rel="noopener"
                           class="font-mono text-base px-8 py-4 rounded inline-block font-medium text-white/80 hover:text-white border transition-colors"
                           style="border-color: rgba(255,255,255,0.18);">
                            linkedin
                        </a>
                    </div>
                </div>
            </section>

            <footer class="px-6 py-8 border-t" style="border-color: rgba(255,255,255,0.06);">
                <div class="max-w-[1600px] mx-auto flex flex-col sm:flex-row items-center justify-between gap-4 font-mono text-xs text-white/30">
                    <span>&copy; {{ date('Y') }} Brian Hinga Njoroge</span>
                    <div class="flex items-center gap-6">
                        <a href="https://github.com/redfang854" target="_blank" rel="noopener" class="hover:text-white/60 transition-colors">github</a>
                        <a href="https://www.linkedin.com/in/brian-hinga-9608ab364/" target="_blank" rel="noopener" class="hover:text-white/60 transition-colors">linkedin</a>
                        <a href="mailto:hingabayo@gmail.com" class="hover:text-white/60 transition-colors">email</a>
                        <span>nairobi, kenya</span>
                    </div>
                </div>
            </footer>

        </div>

        {{-- ============ DEGREE CERTIFICATE MODAL ============ --}}
        <div id="degree-modal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 sm:p-8" style="background: rgba(15,15,15,0.75); backdrop-filter: blur(4px);" onclick="if(event.target === this) closeDegreeModal()">
            <div class="glass-card rounded-2xl max-w-3xl w-full max-h-[90vh] overflow-hidden flex flex-col" style="background: rgba(44,44,44,0.92);">
                <div class="flex items-center justify-between px-6 py-4 border-b" style="border-color: rgba(255,255,255,0.08);">
                    <span class="font-mono text-sm text-white/70">bsc information security &amp; forensics — kca university</span>
                    <button type="button" onclick="closeDegreeModal()" aria-label="Close" class="text-white/50 hover:text-white transition-colors font-mono text-xl leading-none">&times;</button>
                </div>
                <div class="overflow-auto p-4 sm:p-6">
                    <img src="{{ asset('images/degree-certificate.webp') }}" alt="Brian Hinga Njoroge — Bachelor of Science in Information Security and Forensics degree certificate, KCA University" class="w-full h-auto rounded-lg">
                </div>
            </div>
        </div>

        <script>
            function openDegreeModal() {
                const modal = document.getElementById('degree-modal');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            }
            function closeDegreeModal() {
                const modal = document.getElementById('degree-modal');
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = '';
            }
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') closeDegreeModal();
            });
        </script>
    </body>
</html>
