{{-- Header kartu form. Param: $icon, $iconClass, $title, $subtitle, $badge, $badgeClass --}}
<div
    class="flex items-center justify-between gap-space-sm pb-space-md mb-space-lg bg-surface-container-low -mx-space-xl -mt-space-xl p-space-xl rounded-t-2xl">
    <div class="flex items-center gap-space-sm">
        <div class="w-10 h-10 shrink-0 rounded-xl flex items-center justify-center {{ $iconClass }}">
            <span class="material-symbols-outlined text-[24px]">{{ $icon }}</span>
        </div>
        <div>
            <h2 class="font-headline-md text-headline-md text-on-surface">{{ $title }}</h2>
            <p class="font-body-md text-body-md text-on-surface-variant">{{ $subtitle }}</p>
        </div>
    </div>
    <span class="font-label-md text-label-md font-semibold px-space-sm py-1 rounded-full uppercase {{ $badgeClass }}">
        {{ $badge }}
    </span>
</div>
