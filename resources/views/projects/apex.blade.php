<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>APEX — Brian Hinga</title>
        <meta name="description" content="APEX: a multi-sport data dashboard covering six sports with live API integrations, a historical match database, and AI-generated content.">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=space-grotesk:500,600,700|inter:400,500,600|jetbrains-mono:400,500" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[var(--color-bg)] text-white antialiased">

        <div class="fixed inset-0 wallpaper-layer pointer-events-none z-0"></div>
        <div class="fixed inset-0 grain-overlay pointer-events-none z-0"></div>
        <div class="fixed top-0 left-1/2 -translate-x-1/2 w-[900px] h-[600px] pointer-events-none z-0"
             style="background: radial-gradient(ellipse at center, rgba(70,116,52,0.08), transparent 70%);"></div>

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
                    <span class="font-mono text-xs px-2.5 py-1 rounded-full" style="background: rgba(70,116,52,0.18); color: var(--color-leaf);">live</span>
                    <span class="font-mono text-xs text-white/40">independent project</span>
                </div>

                <h1 class="font-display font-semibold text-4xl sm:text-5xl mb-6 text-balance">APEX</h1>
                <p class="text-xl text-white/70 leading-relaxed max-w-2xl mb-8 text-balance">
                    A multi-sport data dashboard covering six sports &mdash; Football, F1, MMA/UFC, Boxing, Rugby,
                    and WRC &mdash; built, deployed, and maintained solo, with live API integrations and a
                    historical database spanning tens of thousands of matches.
                </p>

                <a href="https://sports-dashboard-redfang.vercel.app" target="_blank" rel="noopener"
                   class="font-mono text-sm px-6 py-3 rounded font-medium transition-colors inline-block mb-16"
                   style="background: var(--color-tangerine); color: #1f1f1f;"
                   onmouseover="this.style.background='var(--color-tangerine-hover)'"
                   onmouseout="this.style.background='var(--color-tangerine)'">
                    view live site &rarr;
                </a>

                <div class="flex flex-wrap gap-2 mb-16">
                    @foreach (['React', 'Vite', 'Neon Postgres', 'Supabase', 'Groq API', 'Vercel'] as $tag)
                        <span class="font-mono text-xs px-2.5 py-1 rounded border text-white/50" style="border-color: rgba(255,255,255,0.12);">{{ $tag }}</span>
                    @endforeach
                </div>

                {{-- Overview --}}
                <section class="mb-16">
                    <div class="font-mono text-sm text-[var(--color-tangerine)] mb-4">// overview</div>
                    <ul class="space-y-4 text-white/70 leading-relaxed">
                        <li class="flex gap-3">
                            <span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">Six sports in one dashboard</span> &mdash; live standings,
                            fixtures, and results for Football, F1, MMA/UFC, Boxing, Rugby, and WRC, pulled from the
                            Jolpica F1 and football-data.org APIs via serverless proxies.</span>
                        </li>
                        <li class="flex gap-3">
                            <span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">A historical data layer</span> on Neon PostgreSQL holding
                            over 79,000 matches (52,649 football, 26,380 F1), used to power standings and
                            season-long stats.</span>
                        </li>
                        <li class="flex gap-3">
                            <span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">Supabase</span> handles authentication and a real-time
                            chat feature, letting signed-in users discuss live events as they happen.</span>
                        </li>
                        <li class="flex gap-3">
                            <span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">AI-generated driver bios</span> via the Groq API, adding
                            written context around F1 drivers without hand-authoring every profile.</span>
                        </li>
                    </ul>
                </section>

                {{-- Screenshots --}}
                <section class="mb-16">
                    <div class="font-mono text-sm text-[var(--color-tangerine)] mb-6">// screenshots</div>

                    @php
                        $apexShots = [
                            ['src' => 'apex-5.webp', 'alt' => 'APEX football dashboard showing live Premier League, La Liga, and Serie A standings', 'caption' => 'Football &mdash; live standings and fixtures across Europe\'s top five leagues'],
                            ['src' => 'apex-6.webp', 'alt' => 'APEX rugby dashboard showing Six Nations, URC, and Premiership standings', 'caption' => 'Rugby &mdash; Six Nations, URC, and Premiership coverage'],
                            ['src' => 'apex-7.webp', 'alt' => 'APEX WRC dashboard showing 2026 driver standings and rally calendar', 'caption' => 'WRC &mdash; 2026 driver standings and rally calendar'],
                            ['src' => 'apex-9.webp', 'alt' => 'APEX WRC dashboard scrolled to full driver standings and manufacturers table', 'caption' => 'WRC &mdash; full standings table down to the manufacturers\' championship'],
                            ['src' => 'apex-8.webp', 'alt' => 'APEX admin CMS panel for editing hero, season recap, and story content', 'caption' => 'Admin CMS &mdash; editing hero, season recap, and story content per sport'],
                        ];
                    @endphp

                    <div id="apex-carousel" class="glass-card rounded-xl overflow-hidden">
                        <div class="relative w-full" style="aspect-ratio: 818 / 720;">
                            @foreach ($apexShots as $i => $shot)
                                <img src="/images/apex/{{ $shot['src'] }}" alt="{{ $shot['alt'] }}"
                                     data-slide="{{ $i }}"
                                     class="apex-slide absolute inset-0 w-full h-full object-cover object-top transition-opacity duration-500 {{ $i === 0 ? 'opacity-100' : 'opacity-0 pointer-events-none' }}">
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
                    <p class="font-mono text-xs text-white/30 px-1 mt-2">click the dots to browse &mdash; football, rugby, WRC, and the admin CMS behind them all</p>

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
                    &mdash; source on <a href="https://github.com/redfang854/sports-dashboard" target="_blank" rel="noopener" class="underline" style="color: var(--color-tangerine);">GitHub</a>.
                </p>

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
