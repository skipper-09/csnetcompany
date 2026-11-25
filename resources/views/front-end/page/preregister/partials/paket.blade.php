{{-- SECTION 3: Pilihan Paket --}}
<section class="{{ $card }}">
    @include('front-end.page.preregister.partials.section-header', [
        'icon' => 'speed',
        'iconClass' => 'bg-secondary-fixed text-secondary',
        'title' => 'Pilihan Paket CSNet',
        'subtitle' => 'Internet Cepat Tanpa Batas',
        'badge' => '100% Fiber',
        'badgeClass' => 'bg-secondary-fixed text-on-secondary-fixed',
    ])

    <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md mt-5" id="planGrid">
        <div class="md:col-span-2 text-center py-space-lg text-on-surface-variant">
            Memuat paket layanan...
        </div>
    </div>
    @include('front-end.page.preregister.partials.error', ['field' => 'paket'])
</section>

{{-- Banner promo --}}
<div
    class="bg-gradient-to-r from-primary-container to-secondary-container text-on-primary rounded-2xl p-space-lg shadow-md flex flex-col sm:flex-row sm:items-center justify-between gap-space-lg">
    <div class="flex items-center gap-space-md">
        <div class="w-12 h-12 rounded-xl bg-surface-container-lowest/20 flex items-center justify-center shrink-0">
            <span class="material-symbols-outlined text-[32px] text-white">card_giftcard</span>
        </div>
        <div>
            <h3 class="font-title-sm text-title-sm font-bold text-white">
                Promo Pasang Baru: Gratis Biaya Instalasi!
            </h3>
            <p class="font-body-md text-body-md text-primary-fixed">
                Hemat Rp 350.000 termasuk kabel dropcore hingga 150 meter &amp; pinjam-pakai modem.
            </p>
        </div>
    </div>
    <span
        class="bg-surface-container-lowest text-primary font-label-md text-label-md font-bold px-space-md py-space-2xs rounded-full uppercase shrink-0 shadow-sm">
        Otomatis Terpasang
    </span>
</div>
