@extends('front-end.layout.base')

@section('title', $page_name)

@section('content')
    <link rel="stylesheet"
        href="{{ asset('front-end/css/mitra.css') }}?v={{ filemtime(public_path('front-end/css/mitra.css')) }}">

    <div class="mtr">
        <section class="mtr-section">
            <div class="mtr-container mtr-container--sm">
                <div class="mtr-card mtr-success">
                    <div class="mtr-success__icon">
                        @include('front-end.page.mitra.partials.icon', ['name' => 'file'])
                        <span class="mtr-success__badge">
                            @include('front-end.page.mitra.partials.icon', ['name' => 'check'])
                        </span>
                    </div>

                    <h1>Pendaftaran Berhasil Dikirim!</h1>
                    <p>Terima kasih telah mendaftar sebagai mitra CSNET.<br>
                        Tim kami akan melakukan verifikasi data Anda dan menghubungi Anda melalui email atau WhatsApp.</p>

                    <div class="mtr-regno">
                        <small>Nomor Pendaftaran</small>
                        <strong>{{ $number }}</strong>
                        <small>Simpan nomor ini untuk mengecek status pendaftaran.</small>
                    </div>

                    <div class="mtr-success__actions">
                        <a href="{{ url('/') }}" class="mtr-btn mtr-btn--primary">Kembali ke Beranda</a>
                        <a href="{{ route('mitra.status', ['nomor' => $number, 'email' => $email]) }}" class="mtr-link"
                            style="font-size:14px">Lihat Status Pendaftaran</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
