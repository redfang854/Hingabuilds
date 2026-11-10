// Scroll reveal for cards, images and section headings.
// Rules that keep it out of the reader's way:
//  - anything already on screen when the page loads shows immediately (no hero animation)
//  - body text never animates, only cards, images and section headings
//  - nothing is hidden before this script runs, so if it fails the page is just static
//  - short (0.45s) and plays once; respects "reduce motion"

const SELECTOR = '.glass-card, section h2, article h2, section img, article img';
const STAGGER_MS = 60;
const MAX_STAGGER = 4;
const DURATION_MS = 450;

function init() {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    if (!('IntersectionObserver' in window)) return;

    const fold = window.innerHeight;
    const targets = [...document.querySelectorAll(SELECTOR)].filter((el) => {
        if (el.closest('header, nav, footer, [role="dialog"], #degree-modal')) return false;
        // animate the outer card only, not things inside it
        if (el.parentElement.closest(SELECTOR)) return false;
        const r = el.getBoundingClientRect();
        return r.height > 0 && r.top > fold; // below the fold only
    });

    const observer = new IntersectionObserver(
        (entries) => {
            entries
                .filter((e) => e.isIntersecting)
                .sort((a, b) => a.boundingClientRect.top - b.boundingClientRect.top || a.boundingClientRect.left - b.boundingClientRect.left)
                .forEach((entry, i) => {
                    const el = entry.target;
                    const delay = Math.min(i, MAX_STAGGER) * STAGGER_MS;
                    observer.unobserve(el);
                    el.style.setProperty('--reveal-delay', `${delay}ms`);
                    el.classList.add('is-visible');
                    // remove afterwards so card hover transitions work as before
                    setTimeout(() => {
                        el.classList.remove('reveal', 'is-visible');
                        el.style.removeProperty('--reveal-delay');
                    }, delay + DURATION_MS + 50);
                });
        },
        { threshold: 0, rootMargin: '0px 0px -40px 0px' },
    );

    targets.forEach((el) => {
        el.classList.add('reveal');
        observer.observe(el);
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
} else {
    init();
}
