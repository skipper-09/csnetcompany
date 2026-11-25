{{-- Tim Marketing --}}
<section class="bg-surface-container-lowest rounded-2xl shadow-sm overflow-hidden">
    <div class="flex items-center gap-space-sm bg-surface-container-low p-space-xl">
        <div
            class="w-10 h-10 shrink-0 rounded-xl bg-white text-warning flex items-center justify-center border border-gray-200 shadow-sm">
            <span class="material-symbols-outlined text-[24px]">badge</span>
        </div>
        <div>
            <h2 class="font-headline-md text-headline-md text-on-surface">Tim Marketing</h2>
            <p class="font-body-md text-body-md text-on-surface-variant">
                Khusus diisi oleh tim marketing. Abaikan jika mendaftar secara mandiri.
            </p>
        </div>
    </div>

    <div class="p-space-xl">
        <label class="{{ $label }} flex items-center gap-2" for="kode_marketing">
            Kode Marketing
            <span class="rounded-full bg-gray-100 px-2 py-0.5 text-[11px] font-medium text-gray-500">Opsional</span>
        </label>

        <div class="relative">
            <span class="{{ $iconInside }} pointer-events-none">id_card</span>
            <input id="kode_marketing" name="kode_marketing" type="text"
                class="{{ $inputIcon }} tracking-wider placeholder:tracking-normal" placeholder="Contoh: MKT001"
                value="{{ request('ref') }}" maxlength="20" autocomplete="off"
                spellcheck="false">
        </div>

        <p class="mt-1.5 flex items-center gap-1 text-xs text-gray-500">
            <span class="material-symbols-outlined text-[14px]">info</span>
            Gunakan Kode marketing yang terdaftar.
        </p>
        @include('front-end.page.preregister.partials.error', ['field' => 'kode_marketing'])
    </div>
</section>
