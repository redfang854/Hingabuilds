<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $item['title'] }} — Half Priced Books — Brian Hinga</title>
        <meta name="description" content="{{ $item['summary'] }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=space-grotesk:500,600,700|inter:400,500,600|jetbrains-mono:400,500" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[var(--color-bg)] text-white antialiased">

        <div class="fixed inset-0 wallpaper-layer pointer-events-none z-0" style="background-image: url('{{ asset('images/doodle-wallpaper.webp') }}');"></div>
        <div class="fixed inset-0 grain-overlay pointer-events-none z-0"></div>
        <div class="fixed top-0 left-1/2 -translate-x-1/2 w-[900px] h-[600px] pointer-events-none z-0"
             style="background: radial-gradient(ellipse at center, rgba(245,143,32,0.08), transparent 70%);"></div>

        <div class="relative z-10">

            <header class="fixed top-0 inset-x-0 z-50 glass-nav">
                <nav class="w-full px-6 sm:px-10 h-16 flex items-center justify-between">
                    <a href="{{ url('/') }}" class="font-mono text-sm text-white/90 tracking-tight">
                        <img src="{{ asset('images/bh-logo.svg') }}" alt="Brian Hinga" width="40" height="48" class="h-12 w-auto">
                    </a>
                    <a href="{{ route('projects.half-priced-books') }}" class="font-mono text-[13px] text-white/60 hover:text-white transition-colors">&larr; half priced books</a>
                </nav>
            </header>

            <article class="max-w-[1100px] mx-auto px-6 pt-32 pb-24">

                <a href="{{ route('projects.half-priced-books') }}" class="font-mono text-xs text-white/40 hover:text-white transition-colors">&larr; half priced books</a>

                <div class="flex flex-wrap items-center gap-3 mt-8 mb-6">
                    <span class="font-mono text-xs px-2.5 py-1 rounded-full" style="{{ $item['status'] === 'shipped' ? 'background: rgba(70,116,52,0.18); color: var(--color-leaf);' : 'background: rgba(245,143,32,0.15); color: var(--color-tangerine);' }}">{{ $item['status'] }}</span>
                    <span class="font-mono text-xs text-white/40">{{ strtolower($item['group']) }}@if ($item['system']) &middot; {{ $item['system'] }}@endif</span>
                </div>

                <h1 class="font-display font-semibold text-3xl sm:text-4xl mb-6 text-balance">{{ $item['title'] }}</h1>
                <p class="text-lg text-white/70 leading-relaxed mb-8 text-balance">{{ $item['summary'] }}</p>

                <div class="flex flex-wrap gap-2 mb-14">
                    @foreach ($item['tools'] as $tag)
                        <span class="font-mono text-xs px-2.5 py-1 rounded border text-white/50" style="border-color: rgba(255,255,255,0.12);">{{ $tag }}</span>
                    @endforeach
                </div>

                <div class="glass-card rounded-xl p-7 sm:p-9 [&_code]:font-mono [&_code]:text-sm [&_code]:text-white/80">
                    <section class="mb-10">
                        <div class="font-mono text-sm text-[var(--color-tangerine)] mb-3">// the problem</div>
                        <p class="text-white/70 leading-relaxed">{!! $item['problem'] !!}</p>
                    </section>

                    @if (!empty($item['cause']))
                        <section class="mb-10">
                            <div class="font-mono text-sm text-[var(--color-tangerine)] mb-3">// root cause</div>
                            <p class="text-white/70 leading-relaxed">{!! $item['cause'] !!}</p>
                        </section>
                    @endif

                    <section class="mb-10">
                        <div class="font-mono text-sm text-[var(--color-tangerine)] mb-3">// what I did</div>
                        <ul class="space-y-3 text-white/70 leading-relaxed">
                            @foreach ($item['work'] as $line)
                                <li class="flex gap-3"><span style="color: var(--color-leaf);">&gt;</span><span>{!! $line !!}</span></li>
                            @endforeach
                        </ul>
                    </section>

                    <section class="mb-8">
                        <div class="font-mono text-sm text-[var(--color-tangerine)] mb-3">// impact</div>
                        <p class="text-white/70 leading-relaxed">{!! $item['impact'] !!}</p>
                    </section>

                    <div class="rounded-md p-4 font-mono text-xs" style="background: rgba(0,0,0,0.25);">
                        @foreach ($item['diff'] as [$sign, $text])
                            <div style="color: {{ $sign === '-' ? 'var(--color-tangerine)' : ($sign === '+' ? 'var(--color-leaf)' : 'rgba(255,255,255,0.4)') }};">{{ $sign === '-' ? '−' : $sign }} {{ $text }}</div>
                        @endforeach
                    </div>
                </div>

                <nav class="grid sm:grid-cols-2 gap-4 mt-12 font-mono text-sm">
                    <div>
                        @if ($prev)
                            <a href="{{ route('projects.half-priced-books.show', $prev['slug']) }}" class="block glass-card rounded-xl p-5 text-white/60 hover:text-white transition-colors">
                                <div class="text-xs text-white/30 mb-1">&larr; previous</div>{{ $prev['title'] }}
                            </a>
                        @endif
                    </div>
                    <div>
                        @if ($next)
                            <a href="{{ route('projects.half-priced-books.show', $next['slug']) }}" class="block glass-card rounded-xl p-5 text-white/60 hover:text-white transition-colors sm:text-right">
                                <div class="text-xs text-white/30 mb-1">next &rarr;</div>{{ $next['title'] }}
                            </a>
                        @endif
                    </div>
                </nav>

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
