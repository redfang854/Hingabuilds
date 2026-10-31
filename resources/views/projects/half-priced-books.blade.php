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
    <body class="bg-[var(--color-bg)] text-white antialiased">

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

            <article class="max-w-[1600px] mx-auto px-6 pt-32 pb-24">

                <div class="flex items-center gap-3 mb-6">
                    <span class="font-mono text-xs px-2.5 py-1 rounded-full" style="background: rgba(245,143,32,0.15); color: var(--color-tangerine);">live in production</span>
                    <span class="font-mono text-xs text-white/40">May 2025 &mdash; present &middot; Terra Softworks Limited</span>
                </div>

                <h1 class="font-display font-semibold text-4xl sm:text-5xl mb-6 text-balance">Half Priced Books</h1>
                <p class="text-xl text-white/70 leading-relaxed max-w-3xl mb-10 text-balance">
                    A Nairobi bookseller's online shop and the till system its branches use, sharing one
                    catalogue of 72,000+ products. I joined as an intern and am now a junior engineer on both
                    systems. My work covers features, payments, speed, data integrity, testing, documentation,
                    and the plan for the next version.
                </p>

                <div class="flex flex-wrap gap-2 mb-12">
                    @foreach (['Laravel 10', 'CodeIgniter 3', 'PHP 5.6 → 8.x', 'MySQL 8', 'jQuery / DataTables', 'M-Pesa Daraja', 'PHPUnit', 'GitHub Actions', 'Laravel Queues', 'DigitalOcean'] as $tag)
                        <span class="font-mono text-xs px-2.5 py-1 rounded border text-white/50" style="border-color: rgba(255,255,255,0.12);">{{ $tag }}</span>
                    @endforeach
                </div>

                {{-- At a glance --}}
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-20">
                    <div class="glass-card rounded-xl p-5">
                        <div class="font-display font-semibold text-3xl mb-1" style="color: var(--color-tangerine);">2</div>
                        <div class="font-mono text-xs text-white/50">live codebases &mdash; storefront + POS, one shared database</div>
                    </div>
                    <div class="glass-card rounded-xl p-5">
                        <div class="font-display font-semibold text-3xl mb-1" style="color: var(--color-tangerine);">~1.46B</div>
                        <div class="font-mono text-xs text-white/50">row comparisons per request, removed from the deals &amp; listing queries</div>
                    </div>
                    <div class="glass-card rounded-xl p-5">
                        <div class="font-display font-semibold text-3xl mb-1" style="color: var(--color-leaf);">153</div>
                        <div class="font-mono text-xs text-white/50">automated tests across 4 CI workflows, where there were none</div>
                    </div>
                    <div class="glass-card rounded-xl p-5">
                        <div class="font-display font-semibold text-3xl mb-1" style="color: var(--color-leaf);">11 + 60</div>
                        <div class="font-mono text-xs text-white/50">system documents + page-level references written for an undocumented POS</div>
                    </div>
                </div>

                {{-- Role --}}
                <section class="mb-16">
                    <div class="font-mono text-sm text-[var(--color-tangerine)] mb-4">// my role</div>
                    <p class="text-white/70 leading-relaxed max-w-4xl mb-6">
                        I take a feature or bug from scoping, through code, tests and review, to release. I work on
                        my own branch and open pull requests to the company's GitHub organisation. A senior
                        developer reviews each one and deploys it to production. Every week I send the CTO a
                        technical report (problem, root cause, code changes, tests, commits). For the client, I
                        write a plain-English version with no jargon.
                    </p>
                    <ul class="space-y-3 text-white/70 leading-relaxed max-w-4xl">
                        <li class="flex gap-3"><span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">Two very different stacks:</span> a modern Laravel 10
                            storefront and a legacy CodeIgniter 3 POS that still runs on PHP 5.6 in production.</span></li>
                        <li class="flex gap-3"><span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">Working on live data:</span> both systems read and
                            write the same stock, sales and voucher tables. Any change on one side has to keep the
                            other side correct.</span></li>
                        <li class="flex gap-3"><span style="color: var(--color-leaf);">&gt;</span>
                            <span><span class="text-white">Changes kept small on purpose:</span> each fix touches
                            only what it needs to, ships in its own pull request, and comes with tests where the code
                            allows it.</span></li>
                    </ul>
                </section>

                {{-- Systems --}}
                <section class="mb-20">
                    <div class="font-mono text-sm text-[var(--color-tangerine)] mb-4">// the systems</div>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="glass-card rounded-xl p-6">
                            <div class="font-mono text-xs text-white/30 mb-2">storefront</div>
                            <h3 class="font-display font-semibold text-xl mb-3">Laravel 10 e-commerce site</h3>
                            <p class="text-white/65 text-sm leading-relaxed">
                                Catalogue, search, cart, checkout and e-voucher sales, with M-Pesa STK Push payments
                                through Safaricom's Daraja API. It reads live stock and records sales directly in
                                the POS database through a second database connection. Hosted on DigitalOcean
                                behind nginx.
                            </p>
                        </div>
                        <div class="glass-card rounded-xl p-6">
                            <div class="font-mono text-xs text-white/30 mb-2">in-store</div>
                            <h3 class="font-display font-semibold text-xl mb-3">CodeIgniter 3 point of sale</h3>
                            <p class="text-white/65 text-sm leading-relaxed">
                                Till, inventory across several warehouses, stock transfers, purchasing, vouchers and
                                gift cards, loyalty points, SMS messaging and reporting. Built with server-rendered
                                PHP views, jQuery and DataTables. It is a large legacy codebase with no original
                                documentation.
                            </p>
                        </div>
                    </div>
                    <div class="rounded-md p-4 mt-6 font-mono text-xs text-white/50" style="background: rgba(0,0,0,0.25);">
                        customer &rarr; storefront (Laravel) &rarr; M-Pesa Daraja &rarr; callback &rarr; order recorded in POS DB &larr; till (CodeIgniter 3) &larr; cashier
                    </div>
                </section>

                {{-- Case studies --}}
                <div class="font-mono text-sm text-[var(--color-tangerine)] mb-6">// case studies</div>
                <div class="flex flex-col gap-8">

                {{-- 1: OR-join --}}
                <section class="glass-card mb-0 rounded-xl p-7">
                    <div class="font-mono text-xs text-white/30 mb-2">case study &mdash; database performance</div>
                    <h2 class="font-display font-semibold text-2xl mb-4">The 1.46 billion row query</h2>
                    <p class="text-white/70 leading-relaxed mb-4">
                        The storefront's deals and book-listing queries (<code class="font-mono text-sm text-white/60">fetchBooks</code>,
                        <code class="font-mono text-sm text-white/60">fetchAllDeals</code>,
                        <code class="font-mono text-sm text-white/60">fetchDealsOfTheWeek</code>) joined tables
                        with an <code class="font-mono text-sm text-white/60">OR</code> condition. That looks
                        harmless on its own. Against a 72,000-row product table, it stops MySQL from using an index
                        and works out to roughly <span class="text-white">1.46 billion row comparisons per request</span>.
                    </p>
                    <p class="text-white/70 leading-relaxed mb-5">
                        I found it by profiling the queries, not by guessing. I confirmed the join was the cause,
                        then rewrote the join in all three queries so MySQL can use its indexes again.
                    </p>
                    <div class="rounded-md p-4 font-mono text-xs" style="background: rgba(0,0,0,0.25);">
                        <div style="color: var(--color-tangerine);">&minus; ~1.46B row comparisons per request</div>
                        <div style="color: var(--color-leaf);">+ rewritten join in fetchBooks, fetchAllDeals, fetchDealsOfTheWeek</div>
                    </div>
                </section>

                {{-- 2: performance audit --}}
                <section class="glass-card mb-0 rounded-xl p-7">
                    <div class="font-mono text-xs text-white/30 mb-2">case study &mdash; application performance</div>
                    <h2 class="font-display font-semibold text-2xl mb-4">Speeding up checkout and the catalogue</h2>
                    <p class="text-white/70 leading-relaxed mb-4">
                        The shop page ran a separate warehouse-stock query for each product it showed, up to 48
                        database round-trips for one page. Checkout did the same for every cart item (the classic
                        N+1 problem). On top of that, the M-Pesa listener called the POS API synchronously on every
                        checkout, so the customer's page waited on an outbound HTTP call.
                    </p>
                    <p class="text-white/70 leading-relaxed mb-5">
                        In the storefront's <code class="font-mono text-sm text-white/60">PosService</code>, I
                        replaced the per-product loops with single batched
                        <code class="font-mono text-sm text-white/60">WHERE id IN (...)</code> queries across the
                        shop, cart and order paths. I cached repeat lookups within a request. I also moved the
                        M-Pesa listener and the confirmation email onto Laravel's queue, so checkout responds
                        without waiting for either. The business logic was left unchanged.
                    </p>
                    <div class="rounded-md p-4 font-mono text-xs" style="background: rgba(0,0,0,0.25);">
                        <div style="color: var(--color-tangerine);">&minus; one query per product on shop / cart / checkout, up to 48 per page</div>
                        <div style="color: var(--color-tangerine);">&minus; M-Pesa listener + email blocking the checkout response</div>
                        <div style="color: var(--color-leaf);">+ batched fetches, in-request caching, listener &amp; email moved to queued jobs</div>
                    </div>
                </section>

                {{-- 3: e-voucher --}}
                <section class="glass-card mb-0 rounded-xl p-7">
                    <div class="font-mono text-xs text-white/30 mb-2">case study &mdash; payments, cross-system</div>
                    <h2 class="font-display font-semibold text-2xl mb-4">The e-voucher system, end to end</h2>
                    <p class="text-white/70 leading-relaxed mb-4">
                        I built e-vouchers from scratch across both systems. Customers buy them on the storefront
                        with M-Pesa STK Push. Each purchase syncs into the POS voucher records. Both systems
                        generate voucher numbers the same way, so a voucher has one identity everywhere. Vouchers
                        can be redeemed at online checkout or sold, validated and redeemed at the till. Before
                        writing any code, I worked through the design with the senior developer and followed the
                        path the existing checkout already used to record website sales in the POS.
                    </p>
                    <p class="text-white/70 leading-relaxed mb-5">
                        Along the way I closed a payment-integrity gap: the voucher deduction trusted an amount sent
                        by the browser instead of the total calculated on the server. We also decided that vouchers
                        and gift cards used as payment are not counted as revenue, which keeps the sales reports
                        honest.
                    </p>
                    <div class="rounded-md p-4 font-mono text-xs" style="background: rgba(0,0,0,0.25);">
                        <div style="color: var(--color-leaf);">+ STK Push purchase &rarr; POS sync &rarr; online or in-store redemption</div>
                        <div style="color: var(--color-leaf);">+ deductions computed server-side; vouchers excluded from revenue</div>
                        <div style="color: var(--color-leaf);">+ 82 automated tests covering purchase &amp; redemption on both systems</div>
                    </div>
                </section>

                {{-- 4: POS STK push --}}
                <section class="glass-card mb-0 rounded-xl p-7">
                    <div class="font-mono text-xs text-white/30 mb-2">case study &mdash; payments, integration design</div>
                    <h2 class="font-display font-semibold text-2xl mb-4">M-Pesa at the till, reusing the website's callback</h2>
                    <p class="text-white/70 leading-relaxed mb-4">
                        Cashiers took M-Pesa by checking the customer's phone. The goal was to push the payment
                        request straight to the customer's phone from the POS without touching the live storefront.
                        Daraja sends its result to one registered callback URL, and the storefront already owned it.
                    </p>
                    <p class="text-white/70 leading-relaxed mb-5">
                        Instead of registering a second public endpoint, POS requests use the storefront's existing
                        callback. The storefront recognises a POS-originated request and forwards it to the POS.
                        I'm delivering this in two pull requests: first the "customer has paid" pop-up on the shared
                        paybill, then routing each payment to the paybill of the branch the cashier is logged into.
                        The second step is waiting on each branch's Daraja credentials. The cashier enters the
                        M-Pesa code on the payment, so every sale can be traced back to its transaction.
                    </p>
                    <div class="rounded-md p-4 font-mono text-xs" style="background: rgba(0,0,0,0.25);">
                        <div style="color: var(--color-leaf);">+ one callback, routed by origin; storefront behaviour unchanged</div>
                        <div style="color: var(--color-leaf);">+ M-Pesa transaction code stored on every POS M-Pesa payment</div>
                        <div class="text-white/40">~ per-branch paybill routing: pending branch credentials</div>
                    </div>
                </section>

                {{-- 5: negative stock --}}
                <section class="glass-card mb-0 rounded-xl p-7">
                    <div class="font-mono text-xs text-white/30 mb-2">case study &mdash; data integrity</div>
                    <h2 class="font-display font-semibold text-2xl mb-4">A stock adjustment that failed silently, then went negative</h2>
                    <p class="text-white/70 leading-relaxed mb-4">
                        Stock adjustments showed a success message, but quantities didn't change. The insert was
                        failing silently on two <code class="font-mono text-sm text-white/60">NOT NULL</code>
                        columns the code never filled in. Fixing that revealed a worse bug: subtracting stock had no
                        lower limit, so with overselling enabled a product could go negative. Nobody noticed because
                        the DataTables view shows negative numbers as zero. One record turned out to be sitting at
                        &minus;9,998 in the database.
                    </p>
                    <p class="text-white/70 leading-relaxed mb-5">
                        I fixed the insert so every adjustment gets a proper reference, added a
                        <code class="font-mono text-sm text-white/60">max(0, ...)</code> floor so stock can't go
                        below zero, and corrected the bad record once its real quantity was confirmed. This bug is
                        why the V2 schema has a "no negative values" rule (see below).
                    </p>
                    <div class="rounded-md p-4 font-mono text-xs" style="background: rgba(0,0,0,0.25);">
                        <div style="color: var(--color-tangerine);">&minus; adjustment inserts failing silently on NOT NULL columns</div>
                        <div style="color: var(--color-tangerine);">&minus; no floor on stock subtraction, one record at &minus;9,998</div>
                        <div style="color: var(--color-leaf);">+ reference generated on insert, max(0, ...) floor, record corrected</div>
                    </div>
                </section>

                {{-- 6: cart keys --}}
                <section class="glass-card mb-0 rounded-xl p-7">
                    <div class="font-mono text-xs text-white/30 mb-2">case study &mdash; frontend, in-store</div>
                    <h2 class="font-display font-semibold text-2xl mb-4">A JavaScript object-key bug at the till</h2>
                    <p class="text-white/70 leading-relaxed mb-4">
                        Items in the POS cart kept rearranging themselves. The cart stored items in a JavaScript
                        object keyed by numeric product ID. JavaScript always lists integer-like keys (up to
                        2<sup>32</sup>&minus;2) in ascending order, no matter when they were added. So the
                        on-screen order quietly drifted from the order the cashier scanned.
                    </p>
                    <p class="text-white/70 leading-relaxed mb-5">
                        I switched to timestamp-based keys. Millisecond timestamps are above that integer range, so
                        JavaScript keeps them in the order they were added. I also added cache-busting to the POS's
                        main script so branches wouldn't keep running the old version after the release.
                    </p>
                    <div class="rounded-md p-4 font-mono text-xs" style="background: rgba(0,0,0,0.25);">
                        <div style="color: var(--color-tangerine);">&minus; numeric product-ID keys, re-sorted by the JS engine</div>
                        <div style="color: var(--color-leaf);">+ timestamp keys preserve scan order; cache-busted script</div>
                    </div>
                </section>

                {{-- 7: CI --}}
                <section class="glass-card mb-0 rounded-xl p-7">
                    <div class="font-mono text-xs text-white/30 mb-2">case study &mdash; testing &amp; reliability</div>
                    <h2 class="font-display font-semibold text-2xl mb-4">From no tests to CI on both codebases</h2>
                    <p class="text-white/70 leading-relaxed mb-4">
                        Neither codebase had automated tests. I set up PHPUnit in both, including the CodeIgniter 3
                        POS, which has no built-in test tooling. I also added GitHub Actions workflows that start a
                        fresh MySQL 8.0 database on every push. Fast unit tests (pure logic, no database) are kept
                        separate from feature tests (real HTTP requests against a real, throwaway database). Every
                        pull request is checked before it reaches main, and tests never touch live data.
                    </p>
                    <p class="text-white/70 leading-relaxed mb-5">
                        Four workflows run automatically: 82 tests for e-voucher purchase and redemption across the
                        storefront and POS, and 71 tests for warehouse transfers and the performance changes above.
                    </p>
                    <div class="rounded-md p-4 font-mono text-xs" style="background: rgba(0,0,0,0.25);">
                        <div style="color: var(--color-leaf);">+ 4 GitHub Actions workflows, fresh MySQL 8.0 per run</div>
                        <div style="color: var(--color-leaf);">+ 82 tests: e-voucher purchase &amp; redemption (storefront + POS)</div>
                        <div style="color: var(--color-leaf);">+ 71 tests: warehouse transfers &amp; performance refactor</div>
                    </div>
                </section>

                {{-- 8: documentation & audit --}}
                <section class="glass-card mb-0 rounded-xl p-7">
                    <div class="font-mono text-xs text-white/30 mb-2">case study &mdash; reverse engineering &amp; audit</div>
                    <h2 class="font-display font-semibold text-2xl mb-4">Documenting a legacy POS nobody had written down</h2>
                    <p class="text-white/70 leading-relaxed mb-4">
                        The POS had no documentation, so every change started with reading code. I wrote it down,
                        in two layers. First, an <span class="text-white">11-document system reference</span>:
                        database and ERD, models, controllers, views, config, core, libraries,
                        migrations/hooks/helpers, a security audit of the standalone scripts, the testing setup,
                        and a documentation map. Second, <span class="text-white">60+ page-level references</span>
                        covering sales, quotes, purchases, transfers, people, settings, reports and the shared
                        header. Each one traces what the user does, through the controller and model, down to every
                        table and column it reads or writes, in order.
                    </p>
                    <p class="text-white/70 leading-relaxed mb-4">
                        Tracing every page this way turned up bugs nobody had reported:
                    </p>
                    <ul class="space-y-2 text-white/70 leading-relaxed mb-5">
                        <li class="flex gap-3"><span style="color: var(--color-leaf);">&gt;</span>
                            <span>Audit-log calls with their arguments in the wrong order, the same way across
                            several controllers, so the audit trail recorded the wrong action against the wrong
                            module.</span></li>
                        <li class="flex gap-3"><span style="color: var(--color-leaf);">&gt;</span>
                            <span>A multi-destination stock transfer that takes stock from the source once for
                            each destination picked, but only adds it to the first destination.</span></li>
                        <li class="flex gap-3"><span style="color: var(--color-leaf);">&gt;</span>
                            <span>Reports whose on-screen table and export run different queries, and whole
                            features (bulk actions, exports) that are built but can't be reached from the UI.</span></li>
                        <li class="flex gap-3"><span style="color: var(--color-leaf);">&gt;</span>
                            <span>Security issues by category: an injection risk, sensitive fields exposed to the
                            page, and an update path with no integrity check. All were written up and reported
                            internally.</span></li>
                    </ul>
                    <div class="rounded-md p-4 font-mono text-xs" style="background: rgba(0,0,0,0.25);">
                        <div style="color: var(--color-leaf);">+ 11 system documents + 60+ page references (Markdown &rarr; PDF via pandoc)</div>
                        <div style="color: var(--color-leaf);">+ a map of the codebase the team can work from, plus a backlog of real bugs</div>
                    </div>
                </section>

                {{-- 9: PHP versions --}}
                <section class="glass-card mb-0 rounded-xl p-7">
                    <div class="font-mono text-xs text-white/30 mb-2">case study &mdash; compatibility</div>
                    <h2 class="font-display font-semibold text-2xl mb-4">One codebase, PHP 5.6 in production and 8.3 locally</h2>
                    <p class="text-white/70 leading-relaxed mb-5">
                        The POS runs on PHP 5.6 in production, but development happens on PHP 8.3, where parts of
                        it don't run. Curly-brace string offsets
                        (<code class="font-mono text-sm text-white/60">$str{0}</code>) were removed in PHP 8, and the
                        <code class="font-mono text-sm text-white/60">mcrypt</code> extension was removed back in
                        7.2. I rewrote the offsets with the bracket syntax that works on both versions and added an
                        mcrypt polyfill. Now the same code runs on both, so it can be tested on a modern stack
                        without changing production. During the same pass I searched the codebase for hardcoded
                        credentials.
                    </p>
                    <div class="rounded-md p-4 font-mono text-xs" style="background: rgba(0,0,0,0.25);">
                        <div style="color: var(--color-tangerine);">&minus; fatal errors on PHP 8 (string offsets, missing mcrypt)</div>
                        <div style="color: var(--color-leaf);">+ code that runs on both 5.6 and 8.x; local testing possible</div>
                    </div>
                </section>

                {{-- 10: V2 --}}
                <section class="glass-card mb-0 rounded-xl p-7">
                    <div class="font-mono text-xs text-white/30 mb-2">case study &mdash; architecture</div>
                    <h2 class="font-display font-semibold text-2xl mb-4">Designing version 2</h2>
                    <p class="text-white/70 leading-relaxed mb-4">
                        Two codebases writing to one database with no shared schema, and the problems that causes,
                        led me to write a V2 proposal for the CTO: architecture, tool set, ERD and schema. The plan
                        is <span class="text-white">one Laravel 13 / PHP 8.4 application</span> instead of two.
                        POS code and storefront code live in separate namespaces but share base Eloquent models
                        (Product, Sale, Customer, Warehouse), and a single migrations folder is the only source of
                        truth for the schema. Both front ends stay exactly as they are, and so does every business
                        process.
                    </p>
                    <p class="text-white/70 leading-relaxed mb-5">
                        Main decisions: stay on DigitalOcean's managed MySQL rather than run our own database server;
                        prepare for MySQL 8.4, which I develop against locally in Docker alongside 8.0; drop the
                        legacy accounting tables that nothing uses anymore; reuse the paid APIs we already have
                        instead of adding new costs; and allow no negative values anywhere in the schema.
                    </p>
                    <div class="rounded-md p-4 font-mono text-xs" style="background: rgba(0,0,0,0.25);">
                        <div style="color: var(--color-leaf);">+ one app, one migrations folder, shared models, unchanged front ends</div>
                        <div class="text-white/40">~ proposal stage: architecture, tool set, ERD &amp; schema docs delivered to CTO</div>
                    </div>
                </section>

                </div>

                {{-- Toolkit --}}
                <section class="mt-20 mb-16">
                    <div class="font-mono text-sm text-[var(--color-tangerine)] mb-4">// toolkit &mdash; what I used it for here</div>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                        @foreach ([
                            ['Laravel 10', 'Service-layer refactors (PosService), queued jobs and listeners, a second database connection to the POS, Daraja integration, feature tests over HTTP.'],
                            ['CodeIgniter 3', 'Day-to-day work in a large legacy MVC codebase: controllers, models, libraries, hooks. Traced every page in it end to end for the documentation.'],
                            ['PHP 5.6 → 8.x', 'Code that runs on both versions; fixes for language features removed in PHP 7 and 8; polyfills where an extension is gone.'],
                            ['MySQL 8', 'Query profiling, join rewrites, batched IN-queries, transactions, NOT NULL / constraint debugging, data repair, schema design for V2.'],
                            ['JavaScript / jQuery / DataTables', 'POS cart state, localStorage-based baskets, object-key ordering, cache-busting, fixing a view that loaded 72k rows into the browser.'],
                            ['M-Pesa Daraja', 'STK Push for orders, e-vouchers and the till; callback handling and routing between systems; local callback testing through ngrok.'],
                            ['PHPUnit', 'Unit and feature suites in Laravel and CodeIgniter 3; tests always run against a separate test database, never live data.'],
                            ['GitHub Actions', 'Four CI workflows that start MySQL 8.0 for each run and gate every merge on unit and feature tests.'],
                            ['Git &amp; GitHub', 'Feature branch to pull request to senior review; one change per commit, with Problem / Where / Fix commit messages.'],
                            ['Python', 'Patch scripts that only apply an edit when the target text appears exactly once, with backups; scripted large-file and report generation.'],
                            ['Docker', 'MySQL 8.4 container running next to the system MySQL 8.0, for V2 development.'],
                            ['Technical writing', 'Weekly technical reports to the CTO, plain-English client reports, and the 70+ document POS reference (pandoc / LaTeX).'],
                        ] as [$tool, $use])
                            <div class="glass-card rounded-xl p-5">
                                <div class="font-mono text-sm text-white mb-2">{!! $tool !!}</div>
                                <p class="text-white/60 text-sm leading-relaxed">{{ $use }}</p>
                            </div>
                        @endforeach
                    </div>
                </section>

                {{-- Also shipped --}}
                <section class="mb-4">
                    <div class="font-mono text-sm text-[var(--color-tangerine)] mb-5">// also shipped</div>
                    <div class="grid sm:grid-cols-3 gap-8">
                        <div>
                            <div class="font-mono text-xs text-white/30 mb-3">features</div>
                            <ul class="text-white/60 text-sm leading-relaxed space-y-2">
                                <li>&mdash; "Stock a Library" page + CMS, built end to end</li>
                                <li>&mdash; Gift cards integrated into the POS payment flow</li>
                                <li>&mdash; M-Pesa added as a POS payment option</li>
                                <li>&mdash; Book name, ISBN &amp; author columns on stock transfers</li>
                                <li>&mdash; WhatsApp click tracking on storefront and POS</li>
                                <li>&mdash; CMS-editable top banner, deals &amp; offers copy</li>
                                <li>&mdash; Structured feedback widget replacing a free-text box</li>
                                <li>&mdash; KPI dashboard rebuilt with year/duration filters</li>
                            </ul>
                        </div>
                        <div>
                            <div class="font-mono text-xs text-white/30 mb-3">bug fixes</div>
                            <ul class="text-white/60 text-sm leading-relaxed space-y-2">
                                <li>&mdash; List Books "All Warehouses" loading all 72k rows in the browser</li>
                                <li>&mdash; Scan order wrong when starting a sale at the till</li>
                                <li>&mdash; Cart not clearing after a completed or suspended sale (a flashdata expiry bug)</li>
                                <li>&mdash; Transfers taking stock from one warehouse without adding it to the other</li>
                                <li>&mdash; Duplicate book listings from an incomplete GROUP BY</li>
                                <li>&mdash; Out-of-stock status not adding up across warehouses</li>
                                <li>&mdash; ISBN checker and storefront search fixes</li>
                            </ul>
                        </div>
                        <div>
                            <div class="font-mono text-xs text-white/30 mb-3">in progress</div>
                            <ul class="text-white/60 text-sm leading-relaxed space-y-2">
                                <li>&mdash; Fixes from a senior code review: payment recording and deductions, test-database safety, a loyalty-points overwrite</li>
                                <li>&mdash; Platform audit fixes on the storefront (security, performance, architecture)</li>
                                <li>&mdash; Google Books as a fallback when ISBNdb has no record</li>
                                <li>&mdash; Per-branch M-Pesa paybill routing at the till</li>
                            </ul>
                        </div>
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
