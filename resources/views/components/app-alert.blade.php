<style>
    .xa-overlay {
        position: fixed;
        inset: 0;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 16px;
        background: rgba(15, 23, 42, .55);
        backdrop-filter: blur(4px);
        opacity: 0;
        visibility: hidden;
        transition: opacity .25s ease, visibility .25s ease;
    }

    .xa-overlay.xa-show {
        opacity: 1;
        visibility: visible;
    }

    .xa-box {
        position: relative;
        width: 100%;
        max-width: 380px;
        overflow: hidden;
        padding: 32px 28px 24px;
        border-radius: 20px;
        text-align: center;
        background: #fff;
        box-shadow: 0 25px 60px -12px rgba(0, 0, 0, .35);
        font-family: inherit;
        transform: scale(.7) translateY(30px);
        opacity: 0;
    }

    .xa-overlay.xa-show .xa-box {
        animation: xa-pop .5s cubic-bezier(.34, 1.56, .64, 1) forwards;
    }

    .xa-overlay.xa-hide .xa-box {
        animation: xa-out .2s ease-in forwards;
    }

    /* garis warna bergerak di atas */
    .xa-box::before {
        content: "";
        position: absolute;
        inset: 0 0 auto 0;
        height: 5px;
        background: linear-gradient(90deg, var(--xa-c1), var(--xa-c2), var(--xa-c1));
        background-size: 200% 100%;
        animation: xa-slide 2s linear infinite;
    }

    /* ikon + gelombang */
    .xa-icon {
        position: relative;
        width: 84px;
        height: 84px;
        margin: 0 auto 18px;
        display: grid;
        place-items: center;
        border-radius: 50%;
        color: var(--xa-c1);
        background: var(--xa-bg);
    }

    .xa-icon::before,
    .xa-icon::after {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: 50%;
        border: 2px solid var(--xa-c1);
        opacity: 0;
        animation: xa-ripple 2s ease-out infinite;
    }

    .xa-icon::after {
        animation-delay: 1s;
    }

    .xa-icon svg {
        width: 42px;
        height: 42px;
        animation: xa-float 2.4s ease-in-out infinite;
    }

    .xa-overlay.xa-show .xa-type-error .xa-icon svg {
        animation: xa-shake .6s .35s ease-in-out, xa-float 2.4s 1s ease-in-out infinite;
    }

    .xa-title {
        margin: 0 0 6px;
        font-size: 20px;
        font-weight: 700;
        color: #0f172a;
    }

    .xa-msg {
        margin: 0 0 22px;
        font-size: 14.5px;
        line-height: 1.6;
        color: #64748b;
    }

    .xa-actions {
        display: flex;
        gap: 10px;
        justify-content: center;
    }

    .xa-btn {
        flex: 1;
        padding: 11px 16px;
        border: 0;
        border-radius: 12px;
        cursor: pointer;
        font: inherit;
        font-size: 14px;
        font-weight: 600;
        transition: transform .15s, box-shadow .15s, background .15s;
    }

    .xa-btn:active {
        transform: scale(.96);
    }

    .xa-btn-primary {
        color: #fff;
        background: linear-gradient(135deg, var(--xa-c1), var(--xa-c2));
        box-shadow: 0 8px 20px -6px var(--xa-c1);
    }

    .xa-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 24px -6px var(--xa-c1);
    }

    .xa-btn-ghost {
        color: #475569;
        background: #f1f5f9;
    }

    .xa-btn-ghost:hover {
        background: #e2e8f0;
    }

    /* warna per tipe */
    .xa-type-error {
        --xa-c1: #ef4444;
        --xa-c2: #f97316;
        --xa-bg: #fef2f2;
    }

    .xa-type-success {
        --xa-c1: #10b981;
        --xa-c2: #06b6d4;
        --xa-bg: #ecfdf5;
    }

    .xa-type-warning {
        --xa-c1: #f59e0b;
        --xa-c2: #eab308;
        --xa-bg: #fffbeb;
    }

    .xa-type-info {
        --xa-c1: #3b82f6;
        --xa-c2: #8b5cf6;
        --xa-bg: #eff6ff;
    }

    @keyframes xa-pop {
        to {
            transform: scale(1) translateY(0);
            opacity: 1;
        }
    }

    @keyframes xa-out {
        from {
            transform: scale(1);
            opacity: 1;
        }

        to {
            transform: scale(.85) translateY(10px);
            opacity: 0;
        }
    }

    @keyframes xa-ripple {
        0% {
            transform: scale(1);
            opacity: .6;
        }

        100% {
            transform: scale(1.5);
            opacity: 0;
        }
    }

    @keyframes xa-float {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-5px);
        }
    }

    @keyframes xa-shake {

        0%,
        100% {
            transform: rotate(0);
        }

        20%,
        60% {
            transform: rotate(-12deg);
        }

        40%,
        80% {
            transform: rotate(12deg);
        }
    }

    @keyframes xa-slide {
        to {
            background-position: -200% 0;
        }
    }

    @media (prefers-reduced-motion: reduce) {

        .xa-box,
        .xa-icon::before,
        .xa-icon::after,
        .xa-icon svg,
        .xa-box::before {
            animation: none !important;
        }

        .xa-overlay.xa-show .xa-box {
            transform: none;
            opacity: 1;
        }
    }
</style>

<script>
    window.showAlert = function(opts = {}) {
        const icons = {
            error: '<path d="M1 1l22 22M16.7 11.1A11 11 0 0 1 19 12.6M5 12.6a11 11 0 0 1 5.2-2.5M10.7 5a16 16 0 0 1 12.2 3.6M1.4 8.6a16 16 0 0 1 4.5-2.8M8.5 16.1a5 5 0 0 1 7 0M12 20h.01"/>',
            success: '<path d="M20 6L9 17l-5-5"/>',
            warning: '<path d="M10.3 3.9L1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0zM12 9v4M12 17h.01"/>',
            info: '<circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/>',
        };
        const o = Object.assign({
            type: 'info',
            title: 'Informasi',
            message: '',
            confirmText: 'OK',
            cancelText: null,
            onConfirm: null,
        }, opts);

        return new Promise((resolve) => {
            const el = document.createElement('div');
            el.className = 'xa-overlay';
            el.innerHTML = `
                <div class="xa-box xa-type-${o.type}" role="alertdialog" aria-modal="true" aria-labelledby="xa-t">
                    <div class="xa-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">${icons[o.type] ?? icons.info}</svg>
                    </div>
                    <h3 class="xa-title" id="xa-t"></h3>
                    <p class="xa-msg"></p>
                    <div class="xa-actions">
                        ${o.cancelText ? '<button type="button" class="xa-btn xa-btn-ghost" data-r="0"></button>' : ''}
                        <button type="button" class="xa-btn xa-btn-primary" data-r="1"></button>
                    </div>
                </div>`;
            el.querySelector('.xa-title').textContent = o.title;
            el.querySelector('.xa-msg').textContent = o.message;
            el.querySelector('[data-r="1"]').textContent = o.confirmText;
            if (o.cancelText) el.querySelector('[data-r="0"]').textContent = o.cancelText;

            document.body.appendChild(el);
            requestAnimationFrame(() => el.classList.add('xa-show'));
            el.querySelector('[data-r="1"]').focus();

            const close = (result) => {
                el.classList.add('xa-hide');
                document.removeEventListener('keydown', onKey);
                setTimeout(() => el.remove(), 220);
                resolve(result);
                if (result && typeof o.onConfirm === 'function') o.onConfirm();
            };
            const onKey = (e) => {
                if (e.key === 'Escape') close(false);
            };

            el.addEventListener('click', (e) => {
                if (e.target === el) return close(false);
                const b = e.target.closest('[data-r]');
                if (b) close(b.dataset.r === '1');
            });
            document.addEventListener('keydown', onKey);
        });
    };
</script>
