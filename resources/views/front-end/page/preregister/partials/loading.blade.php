{{-- Layar loading penuh saat pengajuan dikirim --}}
<div id="submitOverlay" class="hidden fixed inset-0 z-[9990] items-center justify-center p-4 bg-black/60 backdrop-blur-sm"
    role="dialog" aria-modal="true" aria-labelledby="submitOverlayTitle" tabindex="-1">
    <div class="w-full max-w-sm rounded-2xl bg-white p-6 text-center shadow-xl">
        <div class="mx-auto mb-4 h-12 w-12 animate-spin rounded-full border-4 border-primary-fixed border-t-primary">
        </div>
        <h2 id="submitOverlayTitle" class="font-title-sm text-title-sm text-on-surface" aria-live="polite"></h2>

        <div class="mt-4 h-3 w-full overflow-hidden rounded-full bg-primary-fixed" role="progressbar"
            aria-label="Progres pengiriman" aria-valuemin="0" aria-valuemax="100" data-progress>
            <div class="h-full w-0 rounded-full bg-primary transition-all duration-300" data-progress-bar></div>
        </div>
        <p class="mt-2 font-headline-md text-headline-md text-primary" data-progress-text></p>

        <p class="mt-3 font-body-md text-body-md text-on-surface-variant">
            Mohon tunggu, jangan tutup atau muat ulang halaman ini.
        </p>
    </div>
</div>
