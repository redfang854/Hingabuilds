<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Half Priced Books — Brian Hinga</title>
        <meta name="description" content="Case studies from building and maintaining a live e-commerce and POS platform for Half Priced Books.">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=space-grotesk:500,600,700|inter:400,500,600|jetbrains-mono:400,500" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[var(--color-bg)] text-white antialiased">

        <div class="fixed inset-0 wallpaper-layer pointer-events-none z-0"></div>
        <div class="fixed inset-0 grain-overlay pointer-events-none z-0"></div>
        <div class="fixed top-0 left-1/2 -translate-x-1/2 w-[900px] h-[600px] pointer-events-none z-0"
             style="background: radial-gradient(ellipse at center, rgba(245,143,32,0.08), transparent 70%);"></div>

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
                    <span class="font-mono text-xs px-2.5 py-1 rounded-full" style="background: rgba(245,143,32,0.15); color: var(--color-tangerine);">live in production</span>
                    <span class="font-mono text-xs text-white/40">May 2025 — present</span>
                </div>

                <h1 class="font-display font-semibold text-4xl sm:text-5xl mb-6 text-balance">Half Priced Books</h1>
                <p class="text-xl text-white/70 leading-relaxed max-w-2xl mb-16 text-balance">
                    Main developer on a live e-commerce storefront and in-store POS system &mdash; owning features
                    from scoping through production deployment, across a 72,000+ product catalogue. Some of the
                    harder problems I've solved, below.
                </p>

                {{-- Case study 1: OR-join bug --}}
                <section class="glass-card mb-16 rounded-xl p-7">
                    <div class="font-mono text-xs text-white/30 mb-2">case study &mdash; e-commerce</div>
                    <h2 class="font-display font-semibold text-2xl mb-4">The 1.46 billion row query</h2>
                    <p class="text-white/70 leading-relaxed mb-4">
                        The storefront's deals and book-listing queries &mdash; <code class="font-mono text-sm text-white/60">fetchBooks</code>,
                        <code class="font-mono text-sm text-white/60">fetchAllDeals</code>,
                        <code class="font-mono text-sm text-white/60">fetchDealsOfTheWeek</code> &mdash; used an OR-join
                        pattern that looked reasonable in isolation but, combined with the size of the product
                        table, was generating roughly <span class="text-white">1.46 billion row comparisons per
                        request.</span>
                    </p>
                    <p class="text-white/70 leading-relaxed mb-5">
                        I traced it through query profiling rather than guessing, confirmed the join was the
                        source, and rewrote the join logic across all three queries to eliminate the combinatorial
                        blow-up.
                    </p>
                    <div class="rounded-md p-4 font-mono text-xs" style="background: rgba(0,0,0,0.25);">
                        <div style="color: var(--color-tangerine);">&minus; ~1.46B row comparisons per request</div>
                        <div style="color: var(--color-leaf);">+ rewritten OR-join across fetchBooks, fetchAllDeals, fetchDealsOfTheWeek</div>
                    </div>
                </section>

                {{-- Case study 2: cart ordering --}}
                <section class="glass-card mb-16 rounded-xl p-7">
                    <div class="font-mono text-xs text-white/30 mb-2">case study &mdash; pos</div>
                    <h2 class="font-display font-semibold text-2xl mb-4">A JavaScript object key bug, in-store</h2>
                    <p class="text-white/70 leading-relaxed mb-4">
                        Cart line items on the in-store POS were re-ordering themselves unpredictably. The root
                        cause was subtle: the cart used numeric product IDs as JavaScript object keys, and
                        JavaScript sorts integer-like object keys numerically regardless of insertion order &mdash;
                        so the display order silently drifted from the order items were actually added.
                    </p>
                    <p class="text-white/70 leading-relaxed mb-5">
                        The fix was switching to timestamp-based keys, which aren't coerced into that numeric
                        sorting behaviour, preserving true insertion order. I also added cache-busting to the
                        POS's core script to stop stale assets from loading in-store during rollout.
                    </p>
                    <div class="rounded-md p-4 font-mono text-xs" style="background: rgba(0,0,0,0.25);">
                        <div style="color: var(--color-tangerine);">&minus; numeric product-ID keys, sorted by JS engine regardless of insertion order</div>
                        <div style="color: var(--color-leaf);">+ timestamp-based keys, insertion order preserved</div>
                    </div>
                </section>

                {{-- Case study 3: e-voucher / M-Pesa --}}
                <section class="glass-card mb-16 rounded-xl p-7">
                    <div class="font-mono text-xs text-white/30 mb-2">case study &mdash; payments</div>
                    <h2 class="font-display font-semibold text-2xl mb-4">The e-voucher flow, end to end</h2>
                    <p class="text-white/70 leading-relaxed mb-4">
                        Built the full e-voucher system from scratch: M-Pesa STK Push purchase on the storefront,
                        synchronisation with the POS's voucher table, consolidated voucher number generation so
                        both systems agree on identity, and a dedicated redemption method in the checkout
                        service.
                    </p>
                    <p class="text-white/70 leading-relaxed mb-5">
                        Along the way I closed a payment-integrity gap where voucher deduction was trusting a
                        client-supplied order total instead of the server-side value &mdash; a small change with
                        real financial consequences if left unfixed.
                    </p>
                    <div class="rounded-md p-4 font-mono text-xs" style="background: rgba(0,0,0,0.25);">
                        <div style="color: var(--color-leaf);">+ M-Pesa STK Push &rarr; sma_e_vouchers sync &rarr; redemption, one consistent flow</div>
                        <div style="color: var(--color-leaf);">+ deduction now reads order-&gt;total_price server-side, not a client value</div>
                    </div>
                </section>

                {{-- Case study 4: performance audit --}}
                <section class="glass-card mb-16 rounded-xl p-7">
                    <div class="font-mono text-xs text-white/30 mb-2">case study &mdash; performance</div>
                    <h2 class="font-display font-semibold text-2xl mb-4">A performance audit across checkout and catalog</h2>
                    <p class="text-white/70 leading-relaxed mb-4">
                        The shop page was issuing a separate warehouse-stock query per product on every load
                        &mdash; up to 48 round-trips for a single page &mdash; and checkout repeated the same
                        per-item pattern against the cart. Underneath it, an M-Pesa listener was calling the POS
                        API synchronously on every checkout, holding the customer's response hostage to an
                        outbound HTTP call.
                    </p>
                    <p class="text-white/70 leading-relaxed mb-5">
                        I replaced the per-product loops with single batched <code class="font-mono text-sm text-white/60">WHERE id IN (...)</code>
                        queries across the shop, cart, and order-processing paths, added in-request caching for
                        repeat lookups, and moved the M-Pesa listener and confirmation email onto Laravel's queue
                        so the checkout response no longer waits on either.
                    </p>
                    <div class="rounded-md p-4 font-mono text-xs" style="background: rgba(0,0,0,0.25);">
                        <div style="color: var(--color-tangerine);">&minus; one query per product on shop/cart/checkout, up to 48 round-trips per page</div>
                        <div style="color: var(--color-tangerine);">&minus; M-Pesa listener + confirmation email blocking the checkout response</div>
                        <div style="color: var(--color-leaf);">+ batched WHERE id IN(...) fetches, in-request caching, listener/email moved to queued jobs</div>
                    </div>
                </section>

                {{-- Case study 5: negative stock bug --}}
                <section class="glass-card mb-16 rounded-xl p-7">
                    <div class="font-mono text-xs text-white/30 mb-2">case study &mdash; data integrity</div>
                    <h2 class="font-display font-semibold text-2xl mb-4">A stock adjustment that failed silently, then went negative</h2>
                    <p class="text-white/70 leading-relaxed mb-4">
                        Stock adjustments were showing a success message while quantities stayed unchanged &mdash;
                        the insert was silently failing on two <code class="font-mono text-sm text-white/60">NOT NULL</code>
                        columns the code never populated. Fixing that surfaced a second, worse bug: subtraction
                        adjustments had no lower bound, so with overselling enabled a product's stock could be
                        driven negative. It went unnoticed because the DataTables view clamps negative numbers to
                        zero on display &mdash; one record was later found sitting at &minus;9,998 in the database.
                    </p>
                    <p class="text-white/70 leading-relaxed mb-5">
                        I fixed the insert to generate a proper reference on every adjustment, added a
                        <code class="font-mono text-sm text-white/60">max(0, ...)</code> floor to the subtraction
                        path so stock can no longer go below zero, and corrected the affected record directly once
                        its true quantity was confirmed.
                    </p>
                    <div class="rounded-md p-4 font-mono text-xs" style="background: rgba(0,0,0,0.25);">
                        <div style="color: var(--color-tangerine);">&minus; adjustment inserts failing silently on NOT NULL columns</div>
                        <div style="color: var(--color-tangerine);">&minus; no floor on stock subtraction &mdash; one record found at -9998</div>
                        <div style="color: var(--color-leaf);">+ reference auto-generated on insert, max(0, ...) floor added, record corrected</div>
                    </div>
                </section>

                {{-- Case study 6: CI / testing --}}
                <section class="glass-card mb-16 rounded-xl p-7">
                    <div class="font-mono text-xs text-white/30 mb-2">case study &mdash; testing &amp; reliability</div>
                    <h2 class="font-display font-semibold text-2xl mb-4">Building CI pipelines instead of hoping nothing breaks</h2>
                    <p class="text-white/70 leading-relaxed mb-4">
                        Both codebases went from no automated testing to dedicated GitHub Actions workflows that
                        spin up a fresh MySQL 8.0 database on every push, separating fast unit tests (pure logic,
                        no database) from feature tests (real HTTP requests against real data) so every change is
                        verified before it can reach main.
                    </p>
                    <p class="text-white/70 leading-relaxed mb-5">
                        Four workflows now run automatically: 82 tests covering e-voucher purchase and redemption
                        across the website and POS, and 71 tests covering warehouse transfers and the query
                        optimisations from the performance audit above &mdash; all passing on every merge.
                    </p>
                    <div class="rounded-md p-4 font-mono text-xs" style="background: rgba(0,0,0,0.25);">
                        <div style="color: var(--color-leaf);">+ 4 GitHub Actions workflows, fresh MySQL 8.0 database per run</div>
                        <div style="color: var(--color-leaf);">+ 82 tests &mdash; e-voucher purchase &amp; redemption (website + POS)</div>
                        <div style="color: var(--color-leaf);">+ 71 tests &mdash; warehouse transfers &amp; performance refactor</div>
                    </div>
                </section>

                {{-- Also shipped --}}
                <section class="mb-4">
                    <h3 class="font-display font-semibold text-lg mb-5 text-white/90">Also shipped</h3>
                    <div class="grid sm:grid-cols-3 gap-8">
                        <div>
                            <div class="font-mono text-xs text-white/30 mb-3">features</div>
                            <ul class="text-white/60 text-sm leading-relaxed space-y-2">
                                <li>&mdash; "Stock a Library" page + CMS, built end to end</li>
                                <li>&mdash; Structured feedback widget replacing an open text box</li>
                                <li>&mdash; CMS-editable top banner, deals &amp; offers copy</li>
                                <li>&mdash; KPI dashboard rebuilt with year/duration filters</li>
                                <li>&mdash; M-Pesa added as a POS payment option</li>
                            </ul>
                        </div>
                        <div>
                            <div class="font-mono text-xs text-white/30 mb-3">bug fixes</div>
                            <ul class="text-white/60 text-sm leading-relaxed space-y-2">
                                <li>&mdash; List Books "All Warehouses" view loading all 72k rows client-side</li>
                                <li>&mdash; Duplicate book listings from an incomplete GROUP BY</li>
                                <li>&mdash; Out-of-stock status not aggregating across warehouses</li>
                                <li>&mdash; Transfers debiting one warehouse without crediting the other</li>
                                <li>&mdash; Cart not clearing post-sale, traced to a flashdata expiry bug</li>
                            </ul>
                        </div>
                        <div>
                            <div class="font-mono text-xs text-white/30 mb-3">ongoing</div>
                            <ul class="text-white/60 text-sm leading-relaxed space-y-2">
                                <li>&mdash; Admin CMS improvements across both systems</li>
                                <li>&mdash; Weekly technical reporting to the CTO</li>
                                <li>&mdash; Cross-system data consistency (website &harr; POS)</li>
                            </ul>
                        </div>
                    </div>
                </section>

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
