@extends('front-end.layout.base')

@section('title', $page_name)

@php
    $infoPerusahaan = [
        'Nama Perusahaan' => $company['company_name'],
        'Bentuk Usaha' => $entities[$company['business_entity']] ?? $company['business_entity'],
        'NPWP' => $company['npwp'],
        'No. NIB' => $company['nib'],
        'Alamat' => $company['address'] . ', ' . $company['city'] . ', ' . $company['province'],
        'Website' => $company['website'],
        'Tahun Berdiri' => $company['established_year'],
        'PIC' => $company['pic_name'],
        'Email' => $company['email'],
        'No. WhatsApp' => $company['phone'],
    ];

    $detailUsaha = [
        'Kategori' => $business['main_category'],
        'Sub Kategori' => $business['sub_category'],
        'Deskripsi' => $business['description'],
        'Produk / Layanan' => $business['products_services'],
        'Area Layanan' => $business['service_area'],
        'Kapasitas Supply' => $business['supply_capacity'],
        'Klien Utama' => $business['main_clients'],
        'Sertifikasi' => $business['certifications'],
    ];
@endphp

@section('content')
    <link rel="stylesheet"
        href="{{ asset('front-end/css/mitra.css') }}?v={{ filemtime(public_path('front-end/css/mitra.css')) }}">

    <div class="mtr">
        <section class="mtr-section">
            <div class="mtr-container mtr-container--md">
                @include('front-end.page.mitra.partials.stepper', ['current' => 4])

                <form action="{{ route('mitra.submit') }}" method="POST" class="mtr-card" data-lock-submit>
                    @csrf

                    <div class="mtr-card__head">
                        <div>
                            <h2>Review Data</h2>
                            <p class="mtr-subtitle">Pastikan semua informasi sudah benar sebelum dikirim.</p>
                        </div>
                        <span class="mtr-badge">Pendaftaran {{ ucfirst($type) }}</span>
                    </div>

                    @foreach ([[1, 'Informasi Perusahaan', $infoPerusahaan], [2, 'Detail Usaha', $detailUsaha]] as [$step, $judul, $rows])
                        <div class="mtr-review">
                            <div class="mtr-review__head">
                                <h3>{{ $judul }}</h3>
                                <a href="{{ route('mitra.step', $step) }}" class="mtr-link">Edit</a>
                            </div>
                            <dl class="mtr-dl">
                                @foreach ($rows as $label => $value)
                                    <div class="mtr-dl__row">
                                        <dt>{{ $label }}</dt>
                                        <dd>{{ $value ?: '-' }}</dd>
                                    </div>
                                @endforeach
                            </dl>
                        </div>
                    @endforeach

                    <div class="mtr-review">
                        <div class="mtr-review__head">
                            <h3>Dokumen Pendukung</h3>
                            <a href="{{ route('mitra.step', 3) }}" class="mtr-link">Edit</a>
                        </div>
                        <div class="mtr-files">
                            @foreach ($files as $field => $path)
                                <div class="mtr-file">
                                    @include('front-end.page.mitra.partials.icon', ['name' => 'file'])
                                    {{ $documents[$field]['label'] ?? $field }}
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <label class="mtr-check">
                        <input type="checkbox" name="agreement" value="1" @checked(old('agreement'))>
                        <span>Saya menyatakan bahwa semua informasi yang diberikan adalah benar dan dapat
                            dipertanggungjawabkan.</span>
                    </label>
                    @error('agreement')
                        <p class="mtr-error">{{ $message }}</p>
                    @enderror

                    <div class="mtr-actions">
                        <a href="{{ route('mitra.step', 3) }}" class="mtr-btn mtr-btn--outline">Kembali</a>
                        <button type="submit" class="mtr-btn mtr-btn--primary">
                            Kirim Pendaftaran
                            @include('front-end.page.mitra.partials.icon', ['name' => 'send'])
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <script src="{{ asset('front-end/js/mitra.js') }}?v={{ filemtime(public_path('front-end/js/mitra.js')) }}"></script>
@endsection
