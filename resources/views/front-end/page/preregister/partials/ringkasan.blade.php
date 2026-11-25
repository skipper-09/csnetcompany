{{-- Ringkasan pengajuan --}}
<div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm">
    <h3
        class="font-headline-md text-headline-md text-on-surface pb-space-xs mb-space-md flex items-center justify-between">
        <span>Ringkasan Pengajuan</span>
        <span class="material-symbols-outlined text-primary">receipt_long</span>
    </h3>

    <div class="space-y-space-sm font-body-md text-body-md pb-space-md">
        <div class="flex justify-between items-center text-on-surface-variant">
            <span>Paket Dipilih:</span>
            <span class="font-title-sm text-title-sm text-on-surface font-bold text-right" data-summary="nama">-</span>
        </div>
        <div class="flex justify-between items-center text-on-surface-variant">
            <span>Kecepatan:</span>
            <span class="font-title-sm text-title-sm text-primary font-semibold" data-summary="mbps">-</span>
        </div>
        <div class="flex justify-between items-center text-on-surface-variant">
            <span>Biaya Registrasi / Instalasi:</span>
            <span class="font-title-sm text-title-sm line-through text-outline">Rp 100.000</span>
        </div>
        @foreach (['harga' => 'Harga Dasar', 'ppn' => 'PPN', 'bhp_uso' => 'BHP / USO', 'pph_23' => 'PPH 23'] as $key => $title)
            <div class="flex justify-between items-center text-on-surface-variant">
                <span>{{ $title }}:</span>
                <span class="font-title-sm text-title-sm font-semibold" data-summary="{{ $key }}">Rp 0</span>
            </div>
        @endforeach
        <div class="flex justify-between items-center text-on-surface-variant">
            <span>Peminjaman Modem Optical:</span>
            <span class="font-title-sm text-title-sm text-on-surface text-right">Gratis</span>
        </div>
    </div>

    <div class="pt-space-md pb-space-lg bg-surface-container-low/60 -mx-space-lg px-space-lg my-space-sm">
        <div class="flex items-baseline justify-between">
            <div>
                <span class="font-label-md text-label-md text-outline uppercase font-semibold block">
                    Total Iuran Bulanan
                </span>
                <span class="font-label-md text-label-md text-outline-variant">Sudah termasuk PPN</span>
            </div>
            <div class="text-right">
                <span class="font-headline-lg text-headline-lg text-primary font-black" data-summary="total">Rp 0</span>
                <span class="font-label-md text-label-md text-outline block">/bulan</span>
            </div>
        </div>
    </div>

    <div class="mb-space-lg">
        <label class="flex items-start gap-space-xs cursor-pointer group">
            <input class="mt-1 w-4 h-4 rounded text-primary focus:ring-primary-container" id="termsCheck"
                name="terms" value="1" type="checkbox" @checked(old('terms')) required />
            <span class="font-body-md text-body-md text-on-surface-variant leading-relaxed select-none">
                Saya menyatakan data yang diisi benar dan menyetujui
                <a class="text-primary hover:underline font-semibold" href="{{ route('tremofservice') }}"
                    target="_blank">Syarat &amp; Ketentuan</a>
                serta <a class="text-primary hover:underline font-semibold" href="{{ route('privacy') }}"
                    target="_blank">Kebijakan Privasi</a> CSNet.
            </span>
        </label>
        @include('front-end.page.preregister.partials.error', ['field' => 'terms'])
    </div>

    {{-- Honeypot anti-bot, jangan diisi --}}
    <div style="position: absolute; left: -9999px;" aria-hidden="true">
        <input type="text" name="website" tabindex="-1" autocomplete="off">
    </div>

    <button id="btnSubmitPreRegister" type="submit"
        class="w-full py-3.5 px-space-lg rounded-xl bg-primary hover:bg-primary-container text-on-primary font-title-sm text-title-sm font-bold shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-space-xs cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed">
        <span class="material-symbols-outlined text-[20px]" data-submit-icon>send</span>
        <span data-submit-text>Kirim Pengajuan</span>
    </button>
</div>

{{-- Kontak bantuan --}}
<div class="bg-surface-container-lowest rounded-2xl p-space-md shadow-sm">
    <div class="flex items-start gap-space-sm">
        <div
            class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center text-primary shrink-0">
            <span class="material-symbols-outlined text-[20px]">support_agent</span>
        </div>
        <div>
            <h4 class="font-title-sm text-title-sm text-on-surface font-bold">Butuh Bantuan Registrasi?</h4>
            <p class="font-body-md text-body-md text-on-surface-variant mt-0.5 mb-space-sm">
                Tim representatif kami siap memandu proses cek area dan berkas Anda.
            </p>
            <div class="flex flex-col gap-1.5 font-body-md text-body-md">
                <a class="flex items-center gap-2 text-primary hover:underline font-semibold"
                    href="https://wa.me/628113456789" target="_blank" rel="noopener">
                    <span class="material-symbols-outlined text-[18px]">chat</span>
                    WhatsApp: 0811-3456-789
                </a>
                <a class="flex items-center gap-2 text-on-surface-variant hover:text-primary transition-colors"
                    href="tel:08001234567">
                    <span class="material-symbols-outlined text-[18px]">call</span>
                    Toll-Free: 0800-1-CSNET (27638)
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Estimasi SLA --}}
<div class="p-space-md rounded-2xl bg-surface-container-low flex items-center gap-space-sm">
    <span class="material-symbols-outlined text-primary text-[28px]">schedule</span>
    <div class="flex flex-col">
        <span class="font-label-md text-label-md text-outline uppercase font-semibold">Estimasi Pasang</span>
        <span class="font-body-md text-body-md text-on-surface font-medium">Maksimal 1 x 24 jam setelah
            verifikasi</span>
    </div>
</div>
