@extends('front-end.layout.base')

@section('title', $page_name)

@section('content')
    <link rel="stylesheet"
        href="{{ asset('front-end/css/mitra.css') }}?v={{ filemtime(public_path('front-end/css/mitra.css')) }}">

    <div class="mtr">
        <section class="mtr-section">
            <div class="mtr-container mtr-container--md">
                @include('front-end.page.mitra.partials.stepper', ['current' => 3])

                <form action="{{ route('mitra.step.store', 3) }}" method="POST" enctype="multipart/form-data" class="mtr-card">
                    @csrf

                    <div class="mtr-card__head">
                        <div>
                            <h2>Dokumen Pendukung</h2>
                            <p class="mtr-subtitle">Unggah dokumen yang diperlukan untuk proses verifikasi.</p>
                        </div>
                    </div>

                    <div class="mtr-docs">
                        @foreach ($documents as $field => $doc)
                            @php $uploaded = !empty($data[$field]); @endphp

                            <div class="mtr-doc">
                                <span class="mtr-doc__icon">
                                    @include('front-end.page.mitra.partials.icon', ['name' => 'file'])
                                </span>

                                <div class="mtr-doc__info">
                                    <p class="mtr-doc__name">
                                        {{ $doc['label'] }}
                                        @if ($doc['required'])
                                            <span style="color:var(--mtr-danger)">*</span>
                                        @else
                                            <span class="mtr-doc__meta">(opsional)</span>
                                        @endif
                                    </p>
                                    <p class="mtr-doc__meta">Format PDF, maksimal {{ $doc['max_mb'] }} MB</p>
                                    <p @class(['mtr-doc__file', 'is-uploaded' => $uploaded])>
                                        {{ $uploaded ? '✓ Sudah diupload' : '' }}
                                    </p>
                                    @error($field)
                                        <p class="mtr-error">{{ $message }}</p>
                                    @enderror
                                </div>

                                <label class="mtr-btn mtr-btn--line mtr-btn--sm">
                                    @include('front-end.page.mitra.partials.icon', ['name' => 'upload'])
                                    {{ $uploaded ? 'Ganti File' : 'Upload File' }}
                                    <input type="file" name="{{ $field }}" accept="application/pdf"
                                        data-max="{{ $doc['max_mb'] }}">
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="mtr-alert">
                        @include('front-end.page.mitra.partials.icon', ['name' => 'info'])
                        <span>Pastikan dokumen yang diunggah masih berlaku dan terbaca dengan jelas.</span>
                    </div>

                    <div class="mtr-actions">
                        <a href="{{ route('mitra.step', 2) }}" class="mtr-btn mtr-btn--outline">Kembali</a>
                        <button type="submit" class="mtr-btn mtr-btn--primary">
                            Lanjut ke Review
                            @include('front-end.page.mitra.partials.icon', ['name' => 'arrow'])
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <script src="{{ asset('front-end/js/mitra.js') }}?v={{ filemtime(public_path('front-end/js/mitra.js')) }}"></script>
@endsection
