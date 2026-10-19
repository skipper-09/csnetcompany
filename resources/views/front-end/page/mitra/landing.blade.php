@extends('front-end.layout.base')

@section('title', $page_name)

@php
    $keunggulan = [
        ['icon' => 'eye', 'judul' => 'Proses Transparan', 'teks' => 'dan Profesional'],
        ['icon' => 'shield', 'judul' => 'Kesempatan Proyek', 'teks' => 'Berkelanjutan'],
        ['icon' => 'trending', 'judul' => 'Bersama Tumbuh', 'teks' => 'Lebih Besar'],
    ];

    $iconKategori = [
        'Perangkat Network' => 'server',
        'Fiber Optik & Aksesoris' => 'link',
        'OLT / ONT' => 'cpu',
        'Kabel & Material Infrastruktur' => 'tower',
        'Konstruksi FTTH' => 'hardhat',
        'Splicing & Instalasi' => 'wrench',
        'IT & Software' => 'code',
        'Transportasi & Logistik' => 'truck',
        'Barang Operasional' => 'package',
        'Jasa Maintenance & Lainnya' => 'headset',
    ];
@endphp

@section('content')
    <link rel="stylesheet"
        href="{{ asset('front-end/css/mitra.css') }}?v={{ filemtime(public_path('front-end/css/mitra.css')) }}">

    <div class="mtr">
        {{-- Hero --}}
        <section class="mtr-hero">
            <div class="mtr-container mtr-hero__inner">
                <div class="mtr-hero__content">
                    <h1>Bersama CSNET<br>Membangun Indonesia<br>Lebih Terhubung</h1>
                    <p>Kami membuka kesempatan bagi perusahaan supplier dan vendor untuk berkolaborasi dalam
                        mendukung perluasan jaringan dan layanan internet CSNET.</p>
                    <div class="mtr-hero__actions">
                        <a href="{{ route('mitra.type') }}" class="mtr-btn mtr-btn--white">Daftar Sekarang</a>
                        <a href="{{ route('mitra.status') }}" class="mtr-btn mtr-btn--ghost">
                            Cek Status Pendaftaran
                            @include('front-end.page.mitra.partials.icon', ['name' => 'arrow'])
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- Keunggulan --}}
        <section class="mtr-features">
            <div class="mtr-container mtr-features__grid">
                @foreach ($keunggulan as $item)
                    <div class="mtr-feature">
                        <span class="mtr-feature__icon">
                            @include('front-end.page.mitra.partials.icon', ['name' => $item['icon']])
                        </span>
                        <span>{{ $item['judul'] }}<br>{{ $item['teks'] }}</span>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Kategori --}}
        <section id="kategori" class="mtr-section">
            <div class="mtr-container">
                <h2 class="mtr-title">Kategori yang Kami Butuhkan</h2>

                <div class="mtr-cat-grid">
                    @foreach ($categories as $category)
                        <div class="mtr-cat">
                            <span class="mtr-cat__icon">
                                @include('front-end.page.mitra.partials.icon', [
                                    'name' => $iconKategori[$category] ?? 'package',
                                ])
                            </span>
                            <p>{{ $category }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- CTA --}}
        <section class="mtr-cta-wrap">
            <div class="mtr-container">
                <div class="mtr-cta">
                    <div>
                        <p class="mtr-cta__quote">“Kolaborasi yang kuat, menciptakan masa depan digital yang lebih baik.”
                        </p>
                        <p class="mtr-cta__text">Siap menjadi bagian dari perluasan jaringan CSNET?</p>
                    </div>
                    <a href="{{ route('mitra.type') }}" class="mtr-btn mtr-btn--white mtr-btn--lg">
                        Daftar Sekarang
                        @include('front-end.page.mitra.partials.icon', ['name' => 'arrow'])
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection
