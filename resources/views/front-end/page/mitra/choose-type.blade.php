@extends('front-end.layout.base')

@section('title', $page_name)

@php
    $jenis = [
        'supplier' => [
            'icon' => 'cart',
            'judul' => 'Supplier',
            'teks' =>
                'Untuk perusahaan yang memasok barang dan perangkat (network, fiber optik, perangkat, material, dsb).',
        ],
        'vendor' => [
            'icon' => 'hardhat',
            'judul' => 'Vendor',
            'teks' => 'Untuk perusahaan yang menyediakan jasa, konstruksi, instalasi, maintenance dan layanan lainnya.',
        ],
    ];
@endphp

@section('content')
    <link rel="stylesheet"
        href="{{ asset('front-end/css/mitra.css') }}?v={{ filemtime(public_path('front-end/css/mitra.css')) }}">

    <div class="mtr">
        <section class="mtr-section">
            <div class="mtr-container mtr-container--md">
                <div class="mtr-card">
                    <div style="text-align:center">
                        <h1 class="mtr-title">Mulai Pendaftaran</h1>
                        <p class="mtr-subtitle">Pilih jenis pendaftaran yang sesuai dengan perusahaan Anda.</p>
                    </div>

                    <form action="{{ route('mitra.type.store') }}" method="POST">
                        @csrf

                        <div class="mtr-types">
                            @foreach ($jenis as $value => $item)
                                <label class="mtr-type">
                                    <input type="radio" name="type" value="{{ $value }}"
                                        @checked(old('type', $selected) === $value)>
                                    <div class="mtr-type__body">
                                        @include('front-end.page.mitra.partials.icon', [
                                            'name' => $item['icon'],
                                            'class' => 'mtr-type__icon',
                                        ])
                                        <h3>{{ $item['judul'] }}</h3>
                                        <p>{{ $item['teks'] }}</p>
                                    </div>
                                    <span class="mtr-type__check">
                                        @include('front-end.page.mitra.partials.icon', ['name' => 'check'])
                                    </span>
                                </label>
                            @endforeach
                        </div>

                        @error('type')
                            <p class="mtr-error" style="text-align:center">{{ $message }}</p>
                        @enderror

                        <div class="mtr-alert" style="margin-top:24px">
                            @include('front-end.page.mitra.partials.icon', ['name' => 'info'])
                            <div>
                                <strong>Anda dapat mendaftar salah satu atau keduanya.</strong>
                                Jika perusahaan Anda menyediakan barang sekaligus jasa, Anda dapat mengajukan
                                pendaftaran untuk Supplier dan Vendor.
                            </div>
                        </div>

                        <div style="margin-top:32px;text-align:center">
                            <button type="submit" class="mtr-btn mtr-btn--primary" style="min-width:200px">
                                Lanjutkan
                                @include('front-end.page.mitra.partials.icon', ['name' => 'arrow'])
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
