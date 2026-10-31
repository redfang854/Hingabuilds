<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>APEX — Brian Hinga</title>
        <meta name="description" content="APEX: a multi-sport dashboard for six sports, built on locked-down serverless API proxies, free-tier engineering, and a tested, documented codebase.">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=space-grotesk:500,600,700|inter:400,500,600|jetbrains-mono:400,500" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[var(--color-bg)] text-white antialiased">

        <div class="fixed inset-0 wallpaper-layer pointer-events-none z-0" style="background-image: url('{{ asset('images/doodle-wallpaper.webp') }}');"></div>
        <div class="fixed inset-0 grain-overlay pointer-events-none z-0"></div>
        <div class="fixed top-0 left-1/2 -translate-x-1/2 w-[900px] h-[600px] pointer-events-none z-0"
             style="background: radial-gradient(ellipse at center, rgba(70,116,52,0.08), transparent 70%);"></div>

        <div class="relative z-10">

            <header class="fixed top-0 inset-x-0 z-50 glass-nav">
                <nav class="w-full px-6 sm:px-10 h-16 flex items-center justify-between">
                    <a href="{{ url('/') }}" class="font-mono text-sm text-white/90 tracking-tight">
                        <span class="text-[var(--color-tangerine)]">~</span>/brian-hinga
                    </a>
                    <a href="{{ url('/#projects') }}" class="font-mono text-[13px] text-white/60 hover:text-white transition-colors">&larr; all projects</a>
                </nav>
            </header>

            <article class="max-w-[1600px] mx-auto px-6 pt-32 pb-24">

                <div class="flex items-center gap-3 mb-6">
                    <span class="font-mono text-xs px-2.5 py-1 rounded-full" style="background: rgba(70,116,52,0.18); color: var(--color-leaf);">live</span>
                    <span class="font-mono text-xs text-white/40">independent project</span>
                </div>

                <h1 class="font-display font-semibold text-4xl sm:text-5xl mb-6 text-balance">APEX</h1>
                <p class="text-xl text-white/70 leading-relaxed max-w-2xl mb-8 text-balance">
                    A multi-sport dashboard for six sports &mdash; Football, F1, MMA/UFC, Boxing, Rugby, and
                    WRC &mdash; built, deployed, and maintained solo. The interesting part isn't the scoreboards:
                    it's keeping API keys safe, staying inside free-tier limits, and being honest about where
                    every number comes from.
                </p>

                <a href="https://sports-dashboard-redfang.vercel.app" target="_blank" rel="noopener"
                   class="font-mono text-sm px-6 py-3 rounded font-medium transition-colors inline-block mb-16"
                   style="background: var(--color-tangerine); color: #1f1f1f;"
                   onmouseover="this.style.background='var(--color-tangerine-hover)'"
                   onmouseout="this.style.background='var(--color-tangerine)'">
                    view live site &rarr;
                </a>

                <div class="flex flex-wrap gap-2 mb-16">
                    @foreach (['React 19', 'Vite', 'Vercel Functions', 'Neon Postgres', 'Upstash Redis', 'Vitest', 'GitHub Actions'] as $tag)
                        <span class="font-mono text-xs px-2.5 py-1 rounded border text-white/50" style="border-color: rgba(255,255,255,0.12);">{{ $tag }}</span>
                    @endforeach
                </div>

                {{-- Why built --}}
                <section class="mb-16">
                    <div class="font-mono text-sm text-[var(--color-tangerine)] mb-4">// the problem</div>
                    <p class="text-white/70 leading-relaxed max-w-4xl">
                        I follow six sports &mdash; Football, F1, MMA, Boxing, Rugby, and WRC &mdash; and every one
                        of them lives on a different site with a different layout. APEX started as a way to fix
                        that for myself: one fast page per sport with standings, results, fixtures and the latest
                        headlines. The harder problem turned out to be the data: six sources, three of them with
                        no free live API, all on free plans with tight limits.
                    </p>
                </section>

                {{-- Architecture --}}
                <section class="mb-16">
                    <div class="font-mono text-sm text-[var(--color-tangerine)] mb-4">// architecture</div>
                    <ul class="space-y-4 text-white/70 leading-relaxed">
                        <li class="flex gap-3">
                            <span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">A React SPA with one URL per sport.</span> Each sport is its own route (<code class="font-mono text-sm">/f1</code>, <code class="font-mono text-sm">/boxing</code>&hellip;) and its own lazily loaded code chunk, so reloads and shared links land on the right page and the first download is just the shell (77&nbsp;KB gzipped).</span>
                        </li>
                        <li class="flex gap-3">
                            <span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">Serverless proxies that hold the keys.</span> football-data.org, API-Football and the Cito API are called through Vercel functions that add the key server-side. Each proxy forwards only an allow-list of endpoint shapes, rate-limits per IP with Upstash Redis, and caches at the edge &mdash; so the keys never reach the browser and a stranger can't use the site as a free relay for my quotas.</span>
                        </li>
                        <li class="flex gap-3">
                            <span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">Free-tier engineering.</span> Football data allows 10 requests a minute and squad data 100 a day. Edge caching, one shared request per league table, a single retry on rate limits, and a permanent per-browser cache for club matching keep the site inside those limits.</span>
                        </li>
                        <li class="flex gap-3">
                            <span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">Honest data.</span> F1 and football are live; news comes from BBC Sport and Autosport RSS. WRC, boxing and rugby have no usable free live source, so they're snapshots refreshed from Wikipedia by a script that parses tables by column name, validates the result, and refuses to write anything suspicious. Every snapshot shows its date and turns into a warning if it goes stale; live views say &ldquo;unavailable&rdquo; instead of quietly showing old numbers.</span>
                        </li>
                        <li class="flex gap-3">
                            <span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">A historical F1 layer</span> on Neon Postgres (26,000+ historical results) that powers each driver's career profile independently of the live API.</span>
                        </li>
                        <li class="flex gap-3">
                            <span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">No accounts, by design.</span> An earlier version had sign-in, a live chat and an admin CMS. I removed all three once they stopped earning their keep &mdash; no personal data to protect, about 185&nbsp;KB less JavaScript, and four fewer write endpoints.</span>
                        </li>
                    </ul>
                    <p class="font-mono text-xs text-white/30 mt-6">
                        note: two early commits had an API key hard-coded in source. The key has been rotated, and CI
                        now fails on hard-coded keys, committed .env files, or anything secret-shaped in the built bundle.
                    </p>
                </section>

                {{-- Engineering --}}
                <section class="mb-16">
                    <div class="font-mono text-sm text-[var(--color-tangerine)] mb-4">// what I'd point a reviewer at</div>
                    <ul class="space-y-4 text-white/70 leading-relaxed">
                        <li class="flex gap-3">
                            <span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">Closing an open relay.</span> An audit found the original proxies forwarded <em>any</em> endpoint with my key attached and allowed every origin. The fix was an allow-list guard plus a CI test that fails if any route forwards a caller-supplied endpoint without it.</span>
                        </li>
                        <li class="flex gap-3">
                            <span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">Tests that are proven to catch regressions.</span> 260+ unit and feature tests (Vitest + Testing Library), fully offline. Key ones were checked by reintroducing the bug they guard against and confirming the suite failed.</span>
                        </li>
                        <li class="flex gap-3">
                            <span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">CI as the safety net.</span> GitHub Actions runs lint, the tests, a build with no secrets present, and a scan of the built bundle for anything secret-shaped, on every push.</span>
                        </li>
                        <li class="flex gap-3">
                            <span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">A race-safe data hook.</span> The shared <code class="font-mono text-sm">useFetch</code> hook ignores responses for arguments that are no longer current, so switching leagues quickly can't show the wrong table.</span>
                        </li>
                        <li class="flex gap-3">
                            <span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">Written down.</span> A <code class="font-mono text-sm">docs/</code> folder covers the architecture (with a diagram), every API route, setup, testing, the security threat model, eleven decision records with their trade-offs, and maintenance runbooks.</span>
                        </li>
                    </ul>
                </section>

                {{-- Screenshots --}}
                <section class="mb-16">
                    <div class="font-mono text-sm text-[var(--color-tangerine)] mb-6">// screenshots</div>

                    @php
                        $apexShots = [
                            ['src' => 'apex-20.webp', 'alt' => 'APEX football tab with Sports Recents headlines and league leaders', 'caption' => 'Football &mdash; latest BBC Sport headlines and the leader of each league'],
                            ['src' => 'apex-21.webp', 'alt' => 'APEX Premier League standings table marked live data', 'caption' => 'Football &mdash; live Premier League standings'],
                            ['src' => 'apex-22.webp', 'alt' => 'APEX Premier League fixtures list with kickoff times', 'caption' => 'Football &mdash; upcoming fixtures with kickoff times'],
                            ['src' => 'apex-23.webp', 'alt' => 'APEX Arsenal squad modal with player photos grouped by position', 'caption' => 'Football &mdash; club squads with photos, filterable by position'],
                            ['src' => 'apex-24.webp', 'alt' => 'APEX Arsenal form modal showing the last 10 results', 'caption' => 'Football &mdash; a club\'s last 10 results and form'],
                            ['src' => 'apex-25.webp', 'alt' => 'APEX Formula 1 tab with headlines, next-race countdown and championship leaders', 'caption' => 'F1 &mdash; next-race countdown, championship leaders and headlines'],
                            ['src' => 'apex-26.webp', 'alt' => 'APEX Formula 1 drivers\' and constructors\' championship standings', 'caption' => 'F1 &mdash; live drivers\' and constructors\' championships'],
                            ['src' => 'apex-27.webp', 'alt' => 'APEX MMA tab with next UFC card countdown and recent results', 'caption' => 'MMA &mdash; next UFC card countdown, latest event and results'],
                            ['src' => 'apex-28.webp', 'alt' => 'APEX boxing tab with unified champions and latest title changes', 'caption' => 'Boxing &mdash; unified champions and latest title changes'],
                            ['src' => 'apex-29.webp', 'alt' => 'APEX boxer profile modal for Naoya Inoue showing record and belts', 'caption' => 'Boxing &mdash; fighter profile with record, KO rate and belts held'],
                            ['src' => 'apex-30.webp', 'alt' => 'APEX rugby tab with Six Nations table and recent Premiership results', 'caption' => 'Rugby &mdash; Six Nations, URC and Premiership tables with recent results'],
                            ['src' => 'apex-31.webp', 'alt' => 'APEX WRC tab with 2026 final driver standings and rally calendar', 'caption' => 'WRC &mdash; final driver standings and the 2026 rally calendar'],
                        ];
                    @endphp

                    <div id="apex-carousel" class="glass-card rounded-xl overflow-hidden mx-auto" style="width: min(100%, 1000px);">
                        <div class="relative w-full" style="aspect-ratio: 16 / 9; background: rgba(0,0,0,0.25);">
                            @foreach ($apexShots as $i => $shot)
                                <img src="/images/apex/{{ $shot['src'] }}" alt="{{ $shot['alt'] }}"
                                     data-slide="{{ $i }}"
                                     class="apex-slide absolute inset-0 w-full h-full object-contain transition-opacity duration-500 {{ $i === 0 ? 'opacity-100' : 'opacity-0 pointer-events-none' }}">
                            @endforeach
                        </div>
                        <div class="flex items-center justify-between gap-4 px-5 py-3">
                            <p class="font-mono text-xs text-white/40" id="apex-caption">{!! $apexShots[0]['caption'] !!}</p>
                            <div class="flex gap-1.5 shrink-0">
                                @foreach ($apexShots as $i => $shot)
                                    <button type="button" data-dot="{{ $i }}" aria-label="Show screenshot {{ $i + 1 }}"
                                            class="apex-dot w-1.5 h-1.5 rounded-full transition-colors"
                                            style="background: {{ $i === 0 ? 'var(--color-tangerine)' : 'rgba(255,255,255,0.2)' }};"></button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <p class="font-mono text-xs text-white/30 px-1 mt-2">click the dots to browse &mdash; all six sports and the squad drill-down</p>

                    <script>
                        (function () {
                            var captions = @json(array_column($apexShots, 'caption'));
                            var slides = document.querySelectorAll('#apex-carousel .apex-slide');
                            var dots = document.querySelectorAll('#apex-carousel .apex-dot');
                            var captionEl = document.getElementById('apex-caption');
                            var active = 0;
                            var timer;

                            function show(i) {
                                active = i;
                                slides.forEach(function (el, idx) {
                                    el.classList.toggle('opacity-100', idx === i);
                                    el.classList.toggle('opacity-0', idx !== i);
                                    el.classList.toggle('pointer-events-none', idx !== i);
                                });
                                dots.forEach(function (el, idx) {
                                    el.style.background = idx === i ? 'var(--color-tangerine)' : 'rgba(255,255,255,0.2)';
                                });
                                captionEl.innerHTML = captions[i];
                            }

                            function next() {
                                show((active + 1) % slides.length);
                            }

                            function restart() {
                                clearInterval(timer);
                                timer = setInterval(next, 4500);
                            }

                            dots.forEach(function (dot) {
                                dot.addEventListener('click', function () {
                                    show(parseInt(dot.dataset.dot, 10));
                                    restart();
                                });
                            });

                            restart();
                        })();
                    </script>
                </section>

                <p class="text-white/40 text-sm">
                    Live at <a href="https://sports-dashboard-redfang.vercel.app" target="_blank" rel="noopener" class="underline" style="color: var(--color-tangerine);">sports-dashboard-redfang.vercel.app</a>
                    &mdash; source and docs on <a href="https://github.com/redfang854/sports-dashboard" target="_blank" rel="noopener" class="underline" style="color: var(--color-tangerine);">GitHub</a>
                    (<a href="https://github.com/redfang854/sports-dashboard/tree/main/docs" target="_blank" rel="noopener" class="underline" style="color: var(--color-tangerine);">architecture &amp; decisions</a>).
                </p>

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
