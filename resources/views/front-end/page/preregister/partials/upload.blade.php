{{-- Kotak upload foto. Param: $name, $title, $icon, $dropText, $hint --}}
<div class="flex flex-col" data-upload>
    <label class="{{ $label }}" for="{{ $name }}">{{ $title }} <span class="text-error">*</span></label>
    <div
        class="flex-1 flex items-center justify-center p-space-lg rounded-2xl bg-surface-container-low/60 text-center cursor-pointer hover:bg-surface-container transition-all group relative">
        <input accept="image/jpeg,image/png" class="absolute inset-0 opacity-0 cursor-pointer w-full h-full"
            id="{{ $name }}" name="{{ $name }}" type="file" required />

        <div class="flex flex-col items-center" data-upload-placeholder>
            <div
                class="w-14 h-14 rounded-full bg-primary-fixed flex items-center justify-center text-primary group-hover:scale-110 transition-transform mb-space-xs shadow-sm">
                <span class="material-symbols-outlined text-[30px]">{{ $icon }}</span>
            </div>
            <span class="font-title-sm text-title-sm text-on-surface font-semibold">
                {{ $dropText }} <span class="text-primary underline">Pilih File</span>
            </span>
            <span class="font-label-md text-label-md text-outline mt-1">
                Format: JPG, JPEG, PNG (Maks. 5 MB). {{ $hint }}
            </span>
        </div>

        <div class="hidden items-center justify-center gap-space-sm min-w-0" data-upload-success>
            <span class="material-symbols-outlined text-primary text-[32px] shrink-0">check_circle</span>
            <div class="text-left min-w-0">
                <span class="font-title-sm text-title-sm text-on-surface font-semibold block truncate"
                    data-upload-name></span>
                <span class="font-label-md text-label-md text-primary font-medium">
                    Foto berhasil dimuat &amp; siap diverifikasi
                </span>
            </div>
        </div>
    </div>
    @include('front-end.page.preregister.partials.error', ['field' => $name])
</div>
