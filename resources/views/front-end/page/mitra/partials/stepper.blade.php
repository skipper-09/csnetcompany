@php
    $steps = ['Informasi Perusahaan', 'Detail Usaha', 'Dokumen', 'Review & Kirim'];
@endphp

<ol class="mtr-stepper">
    @foreach ($steps as $i => $label)
        @php $n = $i + 1; @endphp
        <li @class([
            'mtr-step',
            'is-done' => $n < $current,
            'is-active' => $n === $current,
        ])>
            <span class="mtr-step__dot">
                @if ($n < $current)
                    @include('front-end.page.mitra.partials.icon', ['name' => 'check'])
                @else
                    {{ $n }}
                @endif
            </span>
            <span class="mtr-step__label">{{ $label }}</span>
        </li>
    @endforeach
</ol>
