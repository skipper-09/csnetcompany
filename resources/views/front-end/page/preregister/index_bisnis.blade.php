@extends('front-end.layout.base')

@section('title', $page_name)

@push('css')
    <style>
        .cekarea {
            background-color: #25316D
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <style>
        @layer base {

            html,
            body {
                margin: 0;
                padding: 0;
            }

            body {
                overscroll-behavior: none;
            }

            main> :first-child {
                margin-top: 0 !important;
            }

            main> :last-child {
                margin-bottom: 0 !important;
            }
        }

        ::-webkit-scrollbar {
            display: none;
        }

        .segment-btn {
            -webkit-tap-highlight-color: transparent;
            user-select: none;
            transition: background-color .2s, box-shadow .2s, color .2s;
        }

        .segment-btn:focus {
            outline: none;
        }

        .segment-btn:focus-visible {
            outline: 2px solid rgb(var(--color-primary, 37 99 235) / .5);
            outline-offset: 2px;
        }

        .segment-btn:hover {
            border-color: #93c5fd;
        }

        .segment-btn[aria-checked="true"] {
            border-color: var(--seg-blue);
            background: #eff6ff;
            color: var(--seg-blue);
        }

        .seg-radio {
            position: relative;
            flex-shrink: 0;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid #cbd5e1;
            background: #fff;
            transition: border-color .2s;
        }

        .seg-radio::after {
            content: "";
            position: absolute;
            inset: 3px;
            border-radius: 50%;
            background: var(--seg-blue);
            transform: scale(0);
            transition: transform .25s cubic-bezier(.34, 1.56, .64, 1);
        }

        .segment-btn[aria-checked="true"] .seg-radio {
            border-color: var(--seg-blue);
        }

        .segment-btn[aria-checked="true"] .seg-radio::after {
            transform: scale(1);
        }
    </style>
@endpush

@section('content')
    <section id="hero-2" class="bg--05 hero-section">

    </section>

    <section>
        <div class="container">


            <div class="bg-background font-body-md text-on-surface antialiased">
                <main class="w-full bg-background min-h-screen">
                    <div class="flex flex-col w-full">
                        <!-- Subtle Ambient Glow Background -->
                        <div class="relative w-full overflow-hidden">
                            <div
                                class="absolute -top-40 right-10 w-96 h-96 bg-primary-fixed/20 rounded-full blur-3xl pointer-events-none">
                            </div>
                            <div
                                class="absolute top-80 -left-20 w-80 h-80 bg-secondary-fixed/20 rounded-full blur-3xl pointer-events-none">
                            </div>
                            <div class="max-w-[1200px] mx-auto px-gutter py-space-xl">
                                <!-- Breadcrumb Navigation -->

                                <!-- Page Title & Header Meta -->
                                <div
                                    class="relative w-full overflow-hidden rounded-3xl border border-tertiary/20 bg-gradient-to-br from-tertiary-fixed/70 via-tertiary-fixed/20 to-surface p-6 md:p-8 mb-space-xl">
                                    <span
                                        class="material-symbols-outlined pointer-events-none absolute -right-6 -bottom-10 select-none text-tertiary/10"
                                        style="font-size: 220px; line-height: 1;">apartment</span>

                                    <div class="relative max-w-2xl">
                                        <div
                                            class="inline-flex items-center gap-space-2xs px-space-sm py-1 rounded-full bg-tertiary-fixed text-on-tertiary-fixed text-label-md font-label-md mb-space-xs">
                                            <span class="w-2 h-2 rounded-full bg-tertiary animate-pulse"></span>
                                            PENDAFTARAN RESMI CSNET {{ date('Y') }}
                                        </div>

                                        <div class="flex items-center gap-4">
                                            <div
                                                class="flex h-12 w-12 md:h-14 md:w-14 shrink-0 items-center justify-center rounded-2xl shadow-sm bg-tertiary text-on-tertiary">
                                                <span class="material-symbols-outlined text-[28px]">apartment</span>
                                            </div>
                                            <div>
                                                <h1 class="font-headline-lg text-headline-lg text-on-surface">
                                                    Formulir Pasang Baru (PSB) - Bisnis
                                                </h1>
                                                <p class="text-label-md font-label-md text-on-surface-variant">
                                                    Untuk kantor, toko, dan usaha Anda
                                                </p>
                                            </div>
                                        </div>

                                        <p class="font-body-lg text-body-lg text-on-surface-variant mt-space-xs">
                                            Silakan lengkapi formulir di bawah ini untuk pendaftaran
                                            instalasi jaringan CSNet Ultra Fiber ke lokasi Anda.
                                        </p>
                                    </div>
                                </div>
                                <!-- Stepper Progress Bar Indicator -->

                                <!-- Main Form Layout (Grid Structure) -->
                                @php
                                    $label = 'block font-title-sm text-title-sm text-on-surface mb-space-2xs';
                                    $input =
                                        'w-full px-4 py-3 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md placeholder:text-outline shadow-sm focus:outline-none focus:bg-surface-container-low transition-all';
                                    $inputIcon =
                                        'w-full pl-10 pr-4 py-3 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md placeholder:text-outline shadow-sm focus:outline-none focus:bg-surface-container-low transition-all';
                                    $icon =
                                        'material-symbols-outlined absolute left-3 top-3.5 text-outline text-[20px]';
                                    $header =
                                        'flex items-center justify-between pb-space-md mb-space-lg bg-surface-container-low -mx-space-xl -mt-space-xl p-space-xl rounded-t-2xl';
                                    $card = 'bg-surface-container-lowest rounded-2xl p-space-xl shadow-sm';
                                    $req = '<span class="text-error">*</span>';
                                @endphp

                                <form class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-start"
                                    id="preRegisterForm">
                                    <!-- Left Content Area (8 Cols) -->
                                    <div class="lg:col-span-8 flex flex-col gap-space-xl">

                                        <!-- SECTION 1: Data Perusahaan -->
                                        <section class="{{ $card }}">
                                            <div class="{{ $header }}">
                                                <div class="flex items-center gap-space-sm">
                                                    <div
                                                        class="w-10 h-10 rounded-xl bg-primary-fixed text-primary flex items-center justify-center">
                                                        <span class="material-symbols-outlined text-[24px]">apartment</span>
                                                    </div>
                                                    <div>
                                                        <h2 class="font-headline-md text-headline-md text-on-surface">Data
                                                            Perusahaan</h2>
                                                        <p class="font-body-md text-body-md text-on-surface-variant">
                                                            Informasi legal badan usaha pemohon layanan.</p>
                                                    </div>
                                                </div>
                                                <span
                                                    class="font-label-md text-label-md bg-surface-variant text-on-surface-variant px-space-sm py-1 rounded-full uppercase">Wajib
                                                    Lengkap</span>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-space-lg">
                                                <div class="md:col-span-2">
                                                    <label class="{{ $label }}" for="namaPerusahaan">Nama Perusahaan
                                                        {!! $req !!}</label>
                                                    <div class="relative">
                                                        <span class="{{ $icon }}">business</span>
                                                        <input class="{{ $inputIcon }}" id="namaPerusahaan"
                                                            name="nama_perusahaan" type="text"
                                                            placeholder="Contoh: PT Maju Bersama Sejahtera" required>
                                                    </div>
                                                </div>
                                                <div>
                                                    <label class="{{ $label }}" for="jenis_usaha">Jenis Usaha
                                                        {!! $req !!}</label>

                                                    <div class="relative">
                                                        <span
                                                            class="{{ $icon }} pointer-events-none">category</span>

                                                        <select id="jenis_usaha" name="jenis_usaha" required
                                                            class="w-full appearance-none rounded-lg border border-gray-300 bg-white py-2.5 pl-10 pr-10 text-sm text-gray-800 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30">
                                                            <option value="">-- Pilih jenis usaha --</option>
                                                        </select>

                                                        <span
                                                            class="material-symbols-outlined pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-[20px] text-gray-400">
                                                            expand_more
                                                        </span>
                                                    </div>

                                                    {{-- Di luar wrapper relative supaya icon tidak bergeser --}}
                                                    <div id="jenis_usaha_lainnya_wrap" class="relative mt-2 hidden">
                                                        <span class="{{ $icon }} pointer-events-none">edit</span>
                                                        <input type="text" id="jenis_usaha_lainnya"
                                                            name="jenis_usaha_lainnya" placeholder="Sebutkan jenis usaha"
                                                            maxlength="100"
                                                            class="w-full rounded-lg border border-gray-300 bg-white py-2.5 pl-10 pr-3 text-sm text-gray-800 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/30">
                                                    </div>
                                                </div>

                                                <div>
                                                    <label class="{{ $label }}" for="npwp">NPWP
                                                        Perusahaan {!! $req !!}</label>
                                                    <div class="relative">
                                                        <span class="{{ $icon }}">receipt</span>
                                                        <input class="{{ $inputIcon }}" id="npwp" name="npwp"
                                                            type="text" inputmode="numeric" maxlength="16"
                                                            pattern="[0-9]{15,16}" placeholder="15 / 16 digit angka">
                                                    </div>
                                                </div>
                                                <div>
                                                    <label class="{{ $label }}" for="teleponFax">Telepon / Fax
                                                        Kantor {!! $req !!}</label>
                                                    <div class="relative">
                                                        <span class="{{ $icon }}">call</span>
                                                        <input class="{{ $inputIcon }}" id="teleponFax"
                                                            name="telepon_fax" type="tel"
                                                            placeholder="Contoh: 0333-123456">
                                                    </div>
                                                </div>
                                                <div>
                                                    <label class="{{ $label }}" for="teleponFax">Email
                                                        Kantor {!! $req !!}</label>
                                                    <div class="relative">
                                                        <span class="{{ $icon }}">mail</span>
                                                        <input class="{{ $inputIcon }}" id="teleponFax"
                                                            name="telepon_fax" type="email"
                                                            placeholder="Contoh: info@perusahaan.com">
                                                    </div>
                                                </div>
                                                <div>
                                                    <label class="{{ $label }}" for="pjNama">Nama Penanggung
                                                        Jawab {!! $req !!}</label>
                                                    <div class="relative">
                                                        <span class="{{ $icon }}">person</span>
                                                        <input class="{{ $inputIcon }}" id="pjNama" name="pj_nama"
                                                            type="text" placeholder="Nama sesuai KTP" required>
                                                    </div>
                                                </div>
                                                <div>
                                                    <label class="{{ $label }}" for="financeNama">Nama PIC Finance
                                                        {!! $req !!}</label>
                                                    <div class="relative">
                                                        <span class="{{ $icon }}">person</span>
                                                        <input class="{{ $inputIcon }}" id="financeNama"
                                                            name="finance_nama" type="text"
                                                            placeholder="Nama sesuai KTP" required>
                                                    </div>
                                                </div>
                                                <div>
                                                    <label class="{{ $label }}" for="supportNama">Nama PIC Support
                                                        {!! $req !!}</label>
                                                    <div class="relative">
                                                        <span class="{{ $icon }}">person</span>
                                                        <input class="{{ $inputIcon }}" id="supportNama"
                                                            name="support_nama" type="text"
                                                            placeholder="Nama sesuai KTP"required>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                        <!-- SECTION 2: Alamat & Lokasi Pemasangan -->
                                        <section class="{{ $card }}">
                                            <div class="{{ $header }}">
                                                <div class="flex items-center gap-space-sm">
                                                    <div
                                                        class="w-10 h-10 rounded-xl bg-tertiary-fixed text-tertiary flex items-center justify-center">
                                                        <span
                                                            class="material-symbols-outlined text-[24px]">location_on</span>
                                                    </div>
                                                    <div>
                                                        <h2 class="font-headline-md text-headline-md text-on-surface">
                                                            Alamat
                                                            &amp; Lokasi Pemasangan</h2>
                                                        <p class="font-body-md text-body-md text-on-surface-variant">Titik
                                                            terminasi kabel fiber optik ke lokasi usaha Anda.</p>
                                                    </div>
                                                </div>
                                                <span
                                                    class="font-label-md text-label-md bg-tertiary-fixed text-on-tertiary-fixed font-semibold px-space-sm py-1 rounded-full uppercase">Dropcore
                                                    ODP</span>
                                            </div>

                                            <div class="space-y-space-lg">
                                                <div>
                                                    <label class="{{ $label }}" for="alamatLengkap">Alamat
                                                        Pemasangan Perusahaan {!! $req !!}</label>
                                                    <textarea class="{{ $input }} resize-none" id="alamatLengkap" name="alamat_lengkap" rows="3" required
                                                        placeholder="Nama gedung/ruko, jalan, nomor, lantai, dan patokan terdekat"></textarea>
                                                </div>

                                                <div class="grid grid-cols-2 gap-space-md">
                                                    <div>
                                                        <label class="{{ $label }}" for="rt">RT
                                                            {!! $req !!}</label>
                                                        <input class="{{ $input }}" id="rt" name="rt"
                                                            type="text" placeholder="001" required>
                                                    </div>
                                                    <div>
                                                        <label class="{{ $label }}" for="rw">RW
                                                            {!! $req !!}</label>
                                                        <input class="{{ $input }}" id="rw" name="rw"
                                                            type="text" placeholder="004" required>
                                                    </div>
                                                </div>

                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
                                                    <div>
                                                        <label class="{{ $label }}" for="provinsi">Provinsi
                                                            {!! $req !!}</label>
                                                        <select class="{{ $input }}" id="provinsi"
                                                            name="provinsi" required>
                                                            <option value="">Memuat...</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label class="{{ $label }}" for="kota">Kabupaten /
                                                            Kota {!! $req !!}</label>
                                                        <select class="{{ $input }}" id="kota"
                                                            name="kota" required disabled>
                                                            <option value="">Pilih Provinsi dahulu</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label class="{{ $label }}" for="kecamatan">Kecamatan
                                                            {!! $req !!}</label>
                                                        <select class="{{ $input }}" id="kecamatan"
                                                            name="kecamatan" required disabled>
                                                            <option value="">Pilih Kota/Kabupaten dahulu</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label class="{{ $label }}" for="kelurahan">Kelurahan /
                                                            Desa {!! $req !!}</label>
                                                        <select class="{{ $input }}" id="kelurahan"
                                                            name="kelurahan" required disabled>
                                                            <option value="">Pilih Kecamatan dahulu</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="flex items-center justify-between mb-space-2xs">
                                                        <label class="font-title-sm text-title-sm text-on-surface">
                                                            Titik Koordinat Lokasi Perusahaan {!! $req !!}
                                                        </label>
                                                        <button
                                                            class="inline-flex items-center gap-1 text-primary hover:text-primary-container font-label-md text-label-md font-semibold cursor-pointer"
                                                            onclick="getCurrentLocation()" type="button">
                                                            <span
                                                                class="material-symbols-outlined text-[16px]">my_location</span>
                                                            Gunakan Lokasi Saat Ini
                                                        </button>
                                                    </div>
                                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm">
                                                        <div class="relative">
                                                            <span
                                                                class="material-symbols-outlined absolute left-3 top-3.5 text-outline text-[18px]">explore</span>
                                                            <input
                                                                class="w-full pl-10 pr-4 py-3 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md font-mono shadow-sm"
                                                                id="latitude" name="latitude" type="text"
                                                                value="-7.734812" required>
                                                            <span
                                                                class="absolute right-3 top-3.5 font-label-md text-label-md text-outline">Lat</span>
                                                        </div>
                                                        <div class="relative">
                                                            <span
                                                                class="material-symbols-outlined absolute left-3 top-3.5 text-outline text-[18px]">explore</span>
                                                            <input
                                                                class="w-full pl-10 pr-4 py-3 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md font-mono shadow-sm"
                                                                id="longitude" name="longitude" type="text"
                                                                value="113.689435" required>
                                                            <span
                                                                class="absolute right-3 top-3.5 font-label-md text-label-md text-outline">Long</span>
                                                        </div>
                                                    </div>
                                                    <div id="installationCheckResult" class="mt-space-sm hidden"></div>
                                                </div>

                                                <div>
                                                    <label class="{{ $label }}" for="alamatServer">Alamat / Lokasi
                                                        Ruang Server</label>
                                                    <div class="relative">
                                                        <span class="{{ $icon }}">dns</span>
                                                        <input class="{{ $inputIcon }}" id="alamatServer"
                                                            name="alamat_server" type="text"
                                                            placeholder="Contoh: Lantai 2, ruang IT samping pantry">
                                                    </div>
                                                    <p class="font-label-md text-label-md text-outline mt-1">Titik
                                                        penempatan perangkat ONT/router di lokasi perusahaan.</p>
                                                </div>
                                            </div>
                                        </section>

                                        <!-- SECTION 3: Penanggung Jawab -->
                                        <section class="{{ $card }}">
                                            <div class="{{ $header }}">
                                                <div class="flex items-center gap-space-sm">
                                                    <div
                                                        class="w-10 h-10 rounded-xl bg-white text-warning flex items-center justify-center border border-gray-200 shadow-sm">
                                                        <span class="material-symbols-outlined text-[24px]">badge</span>
                                                    </div>
                                                    <div>
                                                        <h2 class="font-headline-md text-headline-md text-on-surface">
                                                            Tim Marketing</h2>
                                                        <p class="font-body-md text-body-md text-on-surface-variant">
                                                            khusus diisi oleh tim marketing Oxynet, abaikan jika daftar
                                                            secara
                                                            mandiri</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <label class="{{ $label }} flex items-center gap-2"
                                                    for="kode_marketing">
                                                    Kode Marketing
                                                    <span
                                                        class="rounded-full bg-gray-100 px-2 py-0.5 text-[11px] font-medium text-gray-500">Opsional</span>
                                                </label>

                                                <div class="relative">
                                                    <span class="{{ $icon }} pointer-events-none">badge</span>
                                                    <input id="kode_marketing" name="kode_marketing" type="text"
                                                        class="{{ $inputIcon }} uppercase tracking-wider placeholder:normal-case placeholder:tracking-normal"
                                                        placeholder="Contoh: MKT001"
                                                        value="{{ old('kode_marketing', request('ref')) }}"
                                                        maxlength="20" autocomplete="off" spellcheck="false">
                                                </div>

                                                <p class="mt-1.5 flex items-center gap-1 text-xs text-gray-500">
                                                    <span class="material-symbols-outlined text-[14px]">info</span>
                                                    Isi jika Anda direferensikan oleh tim marketing kami.
                                                </p>
                                            </div>
                                        </section>


                                        <!-- SECTION 6: Pilihan Paket -->
                                        <section class="{{ $card }}">
                                            <div class="{{ $header }}">
                                                <div class="flex items-center gap-space-sm">
                                                    <div
                                                        class="w-10 h-10 rounded-xl bg-secondary-fixed text-secondary flex items-center justify-center">
                                                        <span class="material-symbols-outlined text-[24px]">speed</span>
                                                    </div>
                                                    <div>
                                                        <h2 class="font-headline-md text-headline-md text-on-surface">Pilih
                                                            Paket CSNet Ultra Fiber</h2>
                                                        <p class="font-body-md text-body-md text-on-surface-variant">
                                                            Koneksi simetris 1:1 murni tanpa batasan FUP kuota bulanan.</p>
                                                    </div>
                                                </div>
                                                <span
                                                    class="font-label-md text-label-md bg-secondary-fixed text-on-secondary-fixed font-semibold px-space-sm py-1 rounded-full uppercase">100%
                                                    Fiber</span>
                                            </div>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md mt-5" id="planGrid">
                                                <div class="col-span-2 text-center py-space-lg text-on-surface-variant">
                                                    Memuat paket layanan...</div>
                                            </div>
                                        </section>

                                        <!-- Promo Banner -->
                                        <div
                                            class="bg-gradient-to-r from-primary-container to-secondary-container text-on-primary rounded-2xl p-space-lg shadow-md flex items-center justify-between gap-space-lg">
                                            <div class="flex items-center gap-space-md">
                                                <div
                                                    class="w-12 h-12 rounded-xl bg-surface-container-lowest/20 flex items-center justify-center shrink-0">
                                                    <span
                                                        class="material-symbols-outlined text-[32px] text-white">card_giftcard</span>
                                                </div>
                                                <div>
                                                    <h3 class="font-title-sm text-title-sm font-bold text-white">Promo
                                                        Pasang Baru: Gratis Biaya Instalasi!</h3>
                                                    <p class="font-body-md text-body-md text-primary-fixed">Hemat Rp
                                                        350.000 termasuk kabel dropcore hingga 150 meter &amp; pinjam-pakai
                                                        modem.</p>
                                                </div>
                                            </div>
                                            <span
                                                class="bg-surface-container-lowest text-primary font-label-md text-label-md font-bold px-space-md py-space-2xs rounded-full uppercase shrink-0 shadow-sm">Otomatis
                                                Terpasang</span>
                                        </div>
                                    </div>

                                    <!-- Right Sidebar (4 Cols) -->
                                    <div class="lg:col-span-4 flex flex-col gap-space-lg sticky top-24">
                                        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm">
                                            <h3
                                                class="font-headline-md text-headline-md text-on-surface pb-space-xs mb-space-md flex items-center justify-between">
                                                <span>Ringkasan Pengajuan</span>
                                                <span class="material-symbols-outlined text-primary">receipt_long</span>
                                            </h3>

                                            <div id="coverageBadge"
                                                class="mb-space-md p-space-sm rounded-xl bg-surface-container-low flex items-center gap-space-xs hidden">
                                                <span id="coverageBadgeDot"
                                                    class="w-3 h-3 rounded-full shrink-0 animate-pulse"></span>
                                                <div class="flex flex-col">
                                                    <span id="coverageBadgeLabel"
                                                        class="font-label-md text-label-md font-bold uppercase"></span>
                                                    <span id="coverageBadgeText"
                                                        class="font-body-md text-body-md text-on-surface font-semibold"></span>
                                                </div>
                                            </div>

                                            <div class="space-y-space-sm font-body-md text-body-md pb-space-md">
                                                <div class="flex justify-between items-center text-on-surface-variant">
                                                    <span>Paket Dipilih:</span>
                                                    <span class="font-title-sm text-title-sm text-on-surface font-bold"
                                                        id="summaryPlanName">-</span>
                                                </div>
                                                <div class="flex justify-between items-center text-on-surface-variant">
                                                    <span>Kecepatan:</span>
                                                    <span class="font-title-sm text-title-sm text-primary font-semibold"
                                                        id="summarySpeed">-</span>
                                                </div>
                                                <div class="flex justify-between items-center text-on-surface-variant">
                                                    <span>Biaya Registrasi / Instalasi:</span>
                                                    <span class="font-title-sm text-title-sm line-through text-outline">Rp
                                                        100.000</span>
                                                </div>
                                                <div class="flex justify-between items-center text-on-surface-variant">
                                                    <span>Harga Dasar:</span>
                                                    <span class="font-title-sm text-title-sm font-semibold"
                                                        id="summaryHargaDasar">Rp 0</span>
                                                </div>
                                                <div class="flex justify-between items-center text-on-surface-variant">
                                                    <span>PPN:</span>
                                                    <span class="font-title-sm text-title-sm font-semibold"
                                                        id="summaryPpn">Rp 0</span>
                                                </div>
                                                <div class="flex justify-between items-center text-on-surface-variant">
                                                    <span>BHP / USO:</span>
                                                    <span class="font-title-sm text-title-sm font-semibold"
                                                        id="summaryBhpUso">Rp 0</span>
                                                </div>
                                                <div class="flex justify-between items-center text-on-surface-variant">
                                                    <span>PPH 23:</span>
                                                    <span class="font-title-sm text-title-sm font-semibold"
                                                        id="summaryPph23">Rp 0</span>
                                                </div>
                                                <div class="flex justify-between items-center text-on-surface-variant">
                                                    <span>Peminjaman Modem Optical:</span>
                                                    <span
                                                        class="font-title-sm text-title-sm text-on-surface text-right">Gratis</span>
                                                </div>
                                            </div>

                                            <div
                                                class="pt-space-md pb-space-lg bg-surface-container-low/60 -mx-space-lg px-space-lg my-space-sm">
                                                <div class="flex items-baseline justify-between">
                                                    <div>
                                                        <span
                                                            class="font-label-md text-label-md text-outline uppercase font-semibold block">Total
                                                            Iuran Bulanan</span>
                                                        <span
                                                            class="font-label-md text-label-md text-outline-variant">Sudah
                                                            termasuk PPN</span>
                                                    </div>
                                                    <div class="text-right">
                                                        <span
                                                            class="font-headline-lg text-headline-lg text-primary font-black"
                                                            id="summaryTotalPrice">Rp 0</span>
                                                        <span
                                                            class="font-label-md text-label-md text-outline block">/bulan</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-space-lg">
                                                <label class="flex items-start gap-space-xs cursor-pointer group">
                                                    <input
                                                        class="mt-1 w-4 h-4 rounded text-primary focus:ring-primary-container"
                                                        id="termsCheck" required type="checkbox">
                                                    <span
                                                        class="font-body-md text-body-md text-on-surface-variant leading-relaxed select-none">
                                                        Saya menyatakan data perusahaan yang diisi benar dan menyetujui
                                                        <a class="text-primary hover:underline font-semibold"
                                                            href="#">Syarat &amp; Ketentuan</a>
                                                        serta Kebijakan Privasi CSNet Ultra Fiber.
                                                    </span>
                                                </label>
                                            </div>

                                            <button id="btnSubmitPreRegister" type="submit"
                                                class="w-full py-3.5 px-space-lg rounded-xl bg-primary hover:bg-primary-container text-on-primary font-title-sm text-title-sm font-bold shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-space-xs cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-primary disabled:hover:shadow-md">
                                                <span>Kirim Pengajuan</span>
                                                <span class="material-symbols-outlined text-[20px]">send</span>
                                            </button>
                                        </div>

                                        <div class="bg-surface-container-lowest rounded-2xl p-space-md shadow-sm">
                                            <div class="flex items-start gap-space-sm">
                                                <div
                                                    class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center text-primary shrink-0">
                                                    <span
                                                        class="material-symbols-outlined text-[20px]">support_agent</span>
                                                </div>
                                                <div>
                                                    <h4 class="font-title-sm text-title-sm text-on-surface font-bold">Butuh
                                                        Bantuan Registrasi?</h4>
                                                    <p
                                                        class="font-body-md text-body-md text-on-surface-variant mt-0.5 mb-space-sm">
                                                        Tim representatif kami siap memandu proses cek area dan berkas Anda.
                                                    </p>
                                                    <div class="flex flex-col gap-1.5 font-body-md text-body-md">
                                                        <a class="flex items-center gap-2 text-primary hover:underline font-semibold"
                                                            href="https://wa.me/628113456789" target="_blank">
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

                                        <div
                                            class="p-space-md rounded-2xl bg-surface-container-low flex items-center gap-space-sm">
                                            <span
                                                class="material-symbols-outlined text-primary text-[28px]">schedule</span>
                                            <div class="flex flex-col">
                                                <span
                                                    class="font-label-md text-label-md text-outline uppercase font-semibold">Estimasi
                                                    Pasang</span>
                                                <span
                                                    class="font-body-md text-body-md text-on-surface font-medium">Maksimal
                                                    1 x 24 jam setelah verifikasi</span>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <script>
                                    // Alamat penagihan = alamat pemasangan
                                    (function() {
                                        const cb = document.getElementById('samaAlamat');
                                        const pemasangan = document.getElementById('alamatLengkap');
                                        const penagihan = document.getElementById('alamatPenagihan');
                                        const sync = () => {
                                            if (cb.checked) penagihan.value = pemasangan.value;
                                        };

                                        cb.addEventListener('change', () => {
                                            penagihan.readOnly = cb.checked;
                                            penagihan.classList.toggle('bg-surface-container-low', cb.checked);
                                            sync();
                                        });
                                        pemasangan.addEventListener('input', sync);
                                    })();
                                </script>
                            </div>
                        </div>
                    </div>

                </main>
            </div>

        </div>
    </section>


    @push('js')
        <script src="https://cdn.tailwindcss.com"></script>
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            "inverse-surface": "#283044",
                            "surface-bright": "#faf8ff",
                            "secondary-fixed-dim": "#c3c0ff",
                            "inverse-primary": "#9fcaff",
                            "on-secondary-container": "#fffbff",
                            "on-background": "#131b2e",
                            "surface-variant": "#dae2fd",
                            "tertiary-fixed-dim": "#4cd7f6",
                            error: "#ba1a1a",
                            "on-primary-container": "#fbfbff",
                            "primary-container": "#0077c8",
                            "on-error-container": "#93000a",
                            tertiary: "#006476",
                            outline: "#717783",
                            "on-primary": "#ffffff",
                            "on-primary-fixed": "#001d36",
                            primary: "#005e9f",
                            "surface-container-low": "#f2f3ff",
                            "on-tertiary-fixed": "#001f26",
                            "surface-tint": "#0061a5",
                            "inverse-on-surface": "#eef0ff",
                            "secondary-container": "#645efb",
                            "on-secondary-fixed": "#0f0069",
                            surface: "#faf8ff",
                            "on-tertiary": "#ffffff",
                            "surface-dim": "#d2d9f4",
                            "tertiary-fixed": "#acedff",
                            secondary: "#4b41e1",
                            "on-surface": "#131b2e",
                            "tertiary-container": "#007f95",
                            "on-secondary": "#ffffff",
                            "on-primary-fixed-variant": "#00497e",
                            "secondary-fixed": "#e2dfff",
                            "surface-container-highest": "#dae2fd",
                            "error-container": "#ffdad6",
                            "on-error": "#ffffff",
                            "surface-container": "#eaedff",
                            "surface-container-high": "#e2e7ff",
                            "outline-variant": "#c0c7d3",
                            background: "#faf8ff",
                            "on-tertiary-container": "#f5fcff",
                            "on-surface-variant": "#404751",
                            "on-secondary-fixed-variant": "#3323cc",
                            "primary-fixed-dim": "#9fcaff",
                            "on-tertiary-fixed-variant": "#004e5c",
                            "primary-fixed": "#d2e4ff",
                            "surface-container-lowest": "#ffffff",
                        },
                        borderRadius: {
                            DEFAULT: "0.25rem",
                            lg: "0.5rem",
                            xl: "0.75rem",
                            full: "9999px",
                        },
                        spacing: {
                            "space-lg": "1.5rem",
                            gutter: "1.5rem",
                            "space-xl": "2rem",
                            "space-2xs": "0.25rem",
                            "space-sm": "0.75rem",
                            "space-3xl": "4.5rem",
                            "container-max": "1200px",
                            "space-2xl": "3rem",
                            "space-md": "1rem",
                            "space-xs": "0.5rem",
                        },
                        fontFamily: {
                            "headline-md": ["Plus Jakarta Sans"],
                            "headline-lg": ["Plus Jakarta Sans"],
                            "title-sm": ["Plus Jakarta Sans"],
                            "body-lg": ["Plus Jakarta Sans"],
                            "display-hero-mobile": ["Plus Jakarta Sans"],
                            "body-md": ["Plus Jakarta Sans"],
                            "label-md": ["Plus Jakarta Sans"],
                            "metric-stat": ["Plus Jakarta Sans"],
                            "display-hero": ["Plus Jakarta Sans"],
                            "headline-lg-mobile": ["Plus Jakarta Sans"],
                        },
                        fontSize: {
                            "headline-md": [
                                "20px",
                                {
                                    lineHeight: "28px",
                                    fontWeight: "600"
                                },
                            ],
                            "headline-lg": [
                                "30px",
                                {
                                    lineHeight: "38px",
                                    letterSpacing: "-0.015em",
                                    fontWeight: "700",
                                },
                            ],
                            "title-sm": ["16px", {
                                lineHeight: "24px",
                                fontWeight: "600"
                            }],
                            "body-lg": ["16px", {
                                lineHeight: "26px",
                                fontWeight: "400"
                            }],
                            "display-hero-mobile": [
                                "32px",
                                {
                                    lineHeight: "40px",
                                    letterSpacing: "-0.01em",
                                    fontWeight: "800",
                                },
                            ],
                            "body-md": ["14px", {
                                lineHeight: "22px",
                                fontWeight: "400"
                            }],
                            "label-md": [
                                "12px",
                                {
                                    lineHeight: "16px",
                                    letterSpacing: "0.04em",
                                    fontWeight: "600",
                                },
                            ],
                            "metric-stat": [
                                "36px",
                                {
                                    lineHeight: "40px",
                                    letterSpacing: "-0.02em",
                                    fontWeight: "800",
                                },
                            ],
                            "display-hero": [
                                "48px",
                                {
                                    lineHeight: "56px",
                                    letterSpacing: "-0.02em",
                                    fontWeight: "800",
                                },
                            ],
                            "headline-lg-mobile": [
                                "24px",
                                {
                                    lineHeight: "32px",
                                    fontWeight: "700"
                                },
                            ],
                        },
                    },
                },
            };

            const API_BASE = "{{ config('app.base_url_api') }}";

            document.addEventListener("DOMContentLoaded", function() {
                const provinsiEl = document.getElementById("provinsi");
                const kotaEl = document.getElementById("kota");
                const kecamatanEl = document.getElementById("kecamatan");
                const kelurahanEl = document.getElementById("kelurahan");

                const select = document.getElementById('jenis_usaha');
                const other = document.getElementById('jenis_usaha_lainnya');
                const otherWrap = document.getElementById('jenis_usaha_lainnya_wrap');

                select.addEventListener('change', () => {
                    const isOther = select.value === 'lainnya';
                    otherWrap.classList.toggle('hidden', !isOther);
                    other.required = isOther;
                    if (isOther) other.focus();
                    else other.value = '';
                });

                if (!provinsiEl || !kotaEl || !kecamatanEl || !kelurahanEl) {
                    console.error("Dropdown wilayah tidak ditemukan di DOM:", {
                        provinsi: !!provinsiEl,
                        kota: !!kotaEl,
                        kecamatan: !!kecamatanEl,
                        kelurahan: !!kelurahanEl,
                    });
                    return;
                }

                async function fetchOptions(url) {
                    const res = await fetch(url, {
                        headers: {
                            Accept: "application/json"
                        }
                    });
                    const json = await res.json();
                    return json.data || [];
                }

                function fillSelect(selectEl, items, placeholder) {
                    selectEl.innerHTML = `<option value="">${placeholder}</option>`;
                    items.forEach((item) => {
                        const opt = document.createElement("option");
                        opt.value = item.id;
                        opt.textContent = item.nama;
                        selectEl.appendChild(opt);
                    });
                    selectEl.disabled = items.length === 0;
                }

                function resetSelect(selectEl, placeholder) {
                    selectEl.innerHTML = `<option value="">${placeholder}</option>`;
                    selectEl.disabled = true;
                }

                (async function initProvinsi() {
                    try {
                        const data = await fetchOptions(`${API_BASE}/provinsi`);
                        fillSelect(provinsiEl, data, "Pilih Provinsi");
                    } catch (err) {
                        provinsiEl.innerHTML = '<option value="">Gagal memuat data</option>';
                        console.error(err);
                    }
                })();

                (async () => {
                    const select = document.getElementById('jenis_usaha');
                    const other = document.getElementById('jenis_usaha_lainnya');

                    try {
                        const res = await fetch(`${API_BASE}/jenis-usaha`, {
                            headers: {
                                Accept: "application/json"
                            }
                        });
                        const json = await res.json();

                        json.data.forEach(({
                            value,
                            label
                        }) => {
                            select.add(new Option(label, value));
                        });
                    } catch (e) {
                        console.error('Gagal memuat jenis usaha', e);
                    }

                    select.addEventListener('change', () => {
                        const isOther = select.value === 'lainnya';
                        other.classList.toggle('hidden', !isOther);
                        other.required = isOther;
                        if (!isOther) other.value = '';
                    });
                })();

                provinsiEl.addEventListener("change", async function() {
                    resetSelect(kotaEl, "Memuat...");
                    resetSelect(kecamatanEl, "Pilih Kota/Kabupaten dahulu");
                    resetSelect(kelurahanEl, "Pilih Kecamatan dahulu");
                    if (!this.value) {
                        resetSelect(kotaEl, "Pilih Provinsi dahulu");
                        return;
                    }
                    const data = await fetchOptions(`${API_BASE}/kota-kabupaten?provinsi_id=${this.value}`);
                    fillSelect(kotaEl, data, "Pilih Kabupaten/Kota");
                });

                kotaEl.addEventListener("change", async function() {
                    resetSelect(kecamatanEl, "Memuat...");
                    resetSelect(kelurahanEl, "Pilih Kecamatan dahulu");
                    if (!this.value) {
                        resetSelect(kecamatanEl, "Pilih Kota/Kabupaten dahulu");
                        return;
                    }
                    const data = await fetchOptions(
                        `${API_BASE}/kecamatan?kota_kabupaten_id=${this.value}`);
                    fillSelect(kecamatanEl, data, "Pilih Kecamatan");
                });

                kecamatanEl.addEventListener("change", async function() {
                    resetSelect(kelurahanEl, "Memuat...");
                    if (!this.value) {
                        resetSelect(kelurahanEl, "Pilih Kecamatan dahulu");
                        return;
                    }
                    const data = await fetchOptions(`${API_BASE}/kelurahan?kecamatan_id=${this.value}`);
                    fillSelect(kelurahanEl, data, "Pilih Kelurahan/Desa");
                });

                const planGridEl = document.getElementById("planGrid");
                const segmentTabsEl = document.getElementById("segmentTabs");
                const segmentBtns = segmentTabsEl ? segmentTabsEl.querySelectorAll(".segment-btn") : [];

                let allLayanan = [];
                let activeSegment = null;

                function getSegment(item) {
                    const raw = String(item.segmen ?? item.kategori ?? "").trim().toLowerCase();
                    if (["business", "bisnis", "corporate", "korporat", "usaha", "kantor"].includes(raw))
                        return "business";
                    if (["retail", "personal", "rumah", "home", "residensial"].includes(raw)) return "retail";
                    return "retail";
                }

                function formatRp(n) {
                    return "Rp " + Number(n || 0).toLocaleString("id-ID");
                }

                function updateSummary(item) {
                    const total = Number(item.harga) + Number(item.ppn) + Number(item.bhp_uso) + Number(item.pph_23);
                    document.getElementById("summaryPlanName").textContent = item.nama;
                    document.getElementById("summarySpeed").textContent = item.mbps + " Mbps Simetris";
                    document.getElementById("summaryTotalPrice").textContent = formatRp(total);
                    document.getElementById("summaryHargaDasar").textContent = formatRp(item.harga);
                    document.getElementById("summaryPpn").textContent = formatRp(item.ppn);
                    document.getElementById("summaryBhpUso").textContent = formatRp(item.bhp_uso);
                    document.getElementById("summaryPph23").textContent = formatRp(item.pph_23);
                }

                function renderPlanCard(item, isDefault) {
                    const isPopuler = !!item.is_populer;

                    const fiturHtml = (item.fitur || [])
                        .map((f) => `
                            <li class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                                ${f}
                            </li>`)
                        .join("");

                    const label = document.createElement("label");
                    label.className =
                        "relative rounded-xl p-space-md cursor-pointer transition-all flex flex-col justify-between plan-card group " +
                        (isPopuler ?
                            "bg-surface-container-low shadow-md ring-2 ring-primary" :
                            "bg-surface-container-lowest shadow-sm hover:shadow-md");

                    label.innerHTML = `
                        ${isPopuler
                            ? `<div class="absolute -top-3 right-4 bg-primary text-on-primary px-space-sm py-0.5 rounded-full font-label-md text-label-md font-bold uppercase tracking-wider shadow-sm">Paling Populer</div>`
                            : ""}
                        <input ${isDefault ? "checked" : ""} class="hidden" name="selectedPlan" type="radio"
                            value="${item.id}" data-nama="${item.nama}" data-price="${item.harga}" />
                        <div>
                            <div class="flex justify-between items-start mb-space-xs">
                                <span class="font-label-md text-label-md text-primary font-${isPopuler ? "bold" : "semibold"} uppercase">${item.kategori ?? item.nama}</span>
                                <span class="w-5 h-5 rounded-full ${isDefault ? "bg-primary" : "bg-surface-container"} flex items-center justify-center check-indicator text-on-primary">
                                    ${isDefault ? '<span class="material-symbols-outlined text-[14px]">check</span>' : ""}
                                </span>
                            </div>
                            <div class="flex items-baseline gap-1 mb-space-xs">
                                <span class="font-metric-stat text-metric-stat text-primary font-extrabold">${item.mbps}</span>
                                <span class="font-title-sm text-title-sm text-primary font-bold">Mbps</span>
                            </div>
                            <p class="font-body-md text-body-md text-on-surface-variant mb-space-md">${item.deskripsi ?? ""}</p>
                            <ul class="space-y-1.5 font-body-md text-body-md text-on-surface-variant mb-space-md">
                                ${fiturHtml}
                            </ul>
                        </div>
                        <div class="pt-space-xs border-t ${isPopuler ? "border-surface-variant" : "border-surface-container"} flex items-baseline justify-between">
                            <span class="font-${isPopuler ? "headline-md text-headline-md" : "title-sm text-title-sm"} text-primary font-bold">${formatRp(item.harga)}</span>
                            <span class="font-label-md text-label-md text-outline">/ bulan (Netto)</span>
                        </div>
                    `;

                    label.addEventListener("click", function() {
                        if (typeof selectPlan === "function") {
                            selectPlan(item.nama, item.harga, label, item.ppn, item.bhp_uso, item.pph_23);
                        }
                        updateSummary(item);
                    });

                    return label;
                }

                function updateSegmentCounts() {
                    segmentBtns.forEach((btn) => {
                        const seg = btn.dataset.segment;
                        const count = allLayanan.filter((i) => getSegment(i) === seg).length;
                        const countEl = btn.querySelector(".segment-count");
                        if (countEl) countEl.textContent = count;
                        btn.disabled = count === 0;
                        btn.classList.toggle("opacity-50", count === 0);
                        btn.classList.toggle("cursor-not-allowed", count === 0);
                    });
                }

                function setActiveSegmentBtn(segment) {
                    const activeCls = ["bg-primary/10", "ring-2", "ring-primary", "text-primary", "shadow-md"];
                    const inactiveCls = ["bg-surface-container-lowest", "ring-1", "ring-surface-container",
                        "text-on-surface", "shadow-sm"
                    ];

                    segmentBtns.forEach((btn) => {
                        const active = btn.dataset.segment === segment;
                        btn.setAttribute("aria-checked", active ? "true" : "false");
                        btn.classList.remove("bg-primary", "text-on-primary", ...activeCls, ...inactiveCls);
                        btn.classList.add(...(active ? activeCls : inactiveCls));
                    });
                }

                function renderSegment(segment) {
                    activeSegment = segment;
                    setActiveSegmentBtn(segment);

                    const items = allLayanan.filter((i) => getSegment(i) === segment);
                    planGridEl.innerHTML = "";

                    if (items.length === 0) {
                        planGridEl.innerHTML =
                            '<div class="col-span-2 text-center py-space-lg text-on-surface-variant">Belum ada paket untuk segmen ini.</div>';
                        return;
                    }

                    const defaultItem = items.find((i) => i.is_populer) || items[0];
                    let defaultLabel = null;

                    items.forEach((item) => {
                        const isDefault = item === defaultItem;
                        const label = renderPlanCard(item, isDefault);
                        if (isDefault) defaultLabel = label;
                        planGridEl.appendChild(label);
                    });

                    if (typeof selectPlan === "function" && defaultLabel) {
                        selectPlan(defaultItem.nama, defaultItem.harga, defaultLabel, defaultItem.ppn, defaultItem
                            .bhp_uso, defaultItem.pph_23);
                    }
                    updateSummary(defaultItem);
                }

                segmentBtns.forEach((btn) => {
                    btn.addEventListener("click", function() {
                        if (this.disabled || this.dataset.segment === activeSegment) return;
                        renderSegment(this.dataset.segment);
                    });
                });

                async function loadLayananFrontend() {
                    try {
                        const res = await fetch(`${API_BASE}/layanan`, {
                            headers: {
                                Accept: "application/json"
                            }
                        });
                        const json = await res.json();

                        allLayanan = (json.data || []).filter((i) => getSegment(i) === "business");

                        if (allLayanan.length === 0) {
                            planGridEl.innerHTML =
                                '<div class="col-span-2 text-center py-space-lg text-on-surface-variant">Belum ada paket bisnis tersedia.</div>';
                            return;
                        }

                        renderSegment("business");
                    } catch (err) {
                        planGridEl.innerHTML =
                            '<div class="col-span-2 text-center py-space-lg text-error">Gagal memuat paket layanan.</div>';
                        console.error(err);
                    }
                }

                loadLayananFrontend();
            });

            function toggleGender(radio) {
                const maleLabel = document.getElementById("genderMaleLabel");
                const femaleLabel = document.getElementById("genderFemaleLabel");

                if (radio.value === "Laki-laki") {
                    maleLabel.className =
                        "flex items-center justify-center gap-2 py-2.5 px-3 rounded-md cursor-pointer transition-all bg-surface-container-lowest text-primary font-title-sm text-title-sm shadow-sm";
                    femaleLabel.className =
                        "flex items-center justify-center gap-2 py-2.5 px-3 rounded-md cursor-pointer transition-all text-on-surface-variant font-title-sm text-title-sm";
                } else {
                    femaleLabel.className =
                        "flex items-center justify-center gap-2 py-2.5 px-3 rounded-md cursor-pointer transition-all bg-surface-container-lowest text-primary font-title-sm text-title-sm shadow-sm";
                    maleLabel.className =
                        "flex items-center justify-center gap-2 py-2.5 px-3 rounded-md cursor-pointer transition-all text-on-surface-variant font-title-sm text-title-sm";
                }
            }

            function selectPlan(planName, price, cardElement, ppn, bhpUso, pph23) {
                document.querySelectorAll(".plan-card").forEach((card) => {
                    card.classList.remove(
                        "bg-surface-container-low",
                        "ring-2",
                        "ring-primary",
                        "shadow-md",
                    );
                    card.classList.add("bg-surface-container-lowest", "shadow-sm");
                    const indicator = card.querySelector(".check-indicator");
                    if (indicator) {
                        indicator.className =
                            "w-5 h-5 rounded-full bg-surface-container flex items-center justify-center check-indicator text-on-primary";
                        indicator.innerHTML = "";
                    }
                });

                cardElement.classList.remove(
                    "bg-surface-container-lowest",
                    "shadow-sm",
                );
                cardElement.classList.add(
                    "bg-surface-container-low",
                    "ring-2",
                    "ring-primary",
                    "shadow-md",
                );

                const indicator = cardElement.querySelector(".check-indicator");
                if (indicator) {
                    indicator.className =
                        "w-5 h-5 rounded-full bg-primary flex items-center justify-center check-indicator text-on-primary";
                    indicator.innerHTML =
                        '<span class="material-symbols-outlined text-[14px]">check</span>';
                }

                const radio = cardElement.querySelector('input[type="radio"]');
                if (radio) radio.checked = true;

                document.getElementById("summaryPlanName").textContent = planName;
                document.getElementById("summarySpeed").textContent =
                    planName + " Simetris";
                document.getElementById("summaryTotalPrice").textContent =
                    "Rp " + (price + ppn + bhpUso + pph23).toLocaleString("id-ID");
                document.getElementById("summaryHargaDasar").textContent =
                    "Rp " + price.toLocaleString("id-ID");
                document.getElementById("summaryPpn").textContent =
                    "Rp " + ppn.toLocaleString("id-ID");
                document.getElementById("summaryBhpUso").textContent =
                    "Rp " + bhpUso.toLocaleString("id-ID");
                document.getElementById("summaryPph23").textContent =
                    "Rp " + pph23.toLocaleString("id-ID");

            }

            function handleKtpUpload(input) {
                if (input.files && input.files[0]) {
                    const file = input.files[0];
                    document.getElementById("ktpPlaceholder").classList.add("hidden");
                    const successBox = document.getElementById("ktpSuccess");
                    successBox.classList.remove("hidden");
                    document.getElementById("ktpFileName").textContent = file.name;
                }
            }

            function getCurrentLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            document.getElementById("latitude").value =
                                position.coords.latitude.toFixed(6);
                            document.getElementById("longitude").value =
                                position.coords.longitude.toFixed(6);
                        },
                        () => {
                            document.getElementById("latitude").value = "-7.734812";
                            document.getElementById("longitude").value = "113.689435";
                        },
                    );
                }
            }

            document
                .getElementById("preRegisterForm")
                .addEventListener("submit", async function(e) {
                    e.preventDefault();

                    const form = e.target;
                    const terms = document.getElementById("termsCheck");
                    const submitButton = form.querySelector('button[type="submit"]');

                    if (!terms.checked) {
                        alert("Harap setujui Syarat & Ketentuan berlangganan.");
                        return;
                    }

                    const formData = new FormData(form);

                    formData.append(
                        "paket",
                        form.querySelector('input[name="selectedPlan"]:checked')?.value || ""
                    );

                    try {
                        const response = await fetch(`${API_BASE}/bisnis`, {
                            method: "POST",
                            body: formData,
                            headers: {
                                Accept: "application/json"
                            }
                        });

                        const result = await response.json();

                        if (!response.ok) {
                            if (response.status === 422 && result.errors) {
                                const messages = Object.values(result.errors)
                                    .flat()
                                    .join("\n");

                                alert(messages);
                            } else {
                                alert(
                                    result.message ||
                                    "Terjadi kesalahan saat mengirim pengajuan."
                                );
                            }
                            return;
                        }

                        showAlert({
                            type: "success",
                            title: "Pendaftaran Berhasil",
                            message: "Pendaftaran Pre-Register berhasil dikirim! Tim kami akan menghubungi Anda.",
                            cancelText: "Tutup",
                        });

                        form.reset();

                        document.getElementById("summaryPlanName").textContent = "-";
                        document.getElementById("summarySpeed").textContent = "-";
                        document.getElementById("summaryTotalPrice").textContent = "Rp 0";
                        document.getElementById("summaryHargaDasar").textContent = "Rp 0";
                        document.getElementById("summaryPpn").textContent = "Rp 0";
                        document.getElementById("summaryBhpUso").textContent = "Rp 0";
                        document.getElementById("summaryPph23").textContent = "Rp 0";
                    } catch (error) {
                        showAlert({
                            type: "error",
                            title: "Koneksi Terputus",
                            message: "Tidak dapat terhubung ke server. Silakan coba kembali.",
                            confirmText: "Coba Lagi",
                            cancelText: "Tutup",
                            onConfirm: () => location.reload(),
                        });
                    } finally {
                        submitButton.innerHTML = `
                                        <span>Kirim Pengajuan</span>
                                        <span class="material-symbols-outlined text-[20px]">
                                            send
                                        </span>
                                    `;
                    }
                });

            document.addEventListener("DOMContentLoaded", () => {
                const tabs = document.getElementById("segmentTabs");
                if (!tabs) return;

                function pilihSegment(seg) {
                    tabs.querySelectorAll("[data-segment]").forEach((btn) => {
                        btn.setAttribute("aria-checked", btn.dataset.segment === seg ? "true" : "false");
                    });

                    window.activeSegment = seg;

                    if (typeof window.renderPlans === "function") window.renderPlans();
                }

                tabs.addEventListener("click", (e) => {
                    const btn = e.target.closest("[data-segment]");
                    if (btn) pilihSegment(btn.dataset.segment);
                });

                pilihSegment("retail");
            });
        </script>
    @endpush
@endsection
