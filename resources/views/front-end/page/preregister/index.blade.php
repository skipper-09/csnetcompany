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
                                    class="flex flex-col md:flex-row md:items-end justify-between gap-space-md mb-space-xl">
                                    <div class="max-w-2xl">
                                        <div
                                            class="inline-flex items-center gap-space-2xs px-space-sm py-1 rounded-full bg-primary-fixed text-on-primary-fixed text-label-md font-label-md mb-space-xs">
                                            <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                                            PENDAFTARAN RESMI CSNET {{ date('Y') }}
                                        </div>
                                        <h1 class="font-headline-lg text-headline-lg text-on-surface">
                                            Formulir Pre-Register Pasang Baru Internet Fiber
                                        </h1>
                                        <p class="font-body-lg text-body-lg text-on-surface-variant mt-space-2xs">
                                            Silakan lengkapi formulir di bawah ini untuk pendaftaran
                                            instalasi jaringan CSNet Ultra Fiber ke lokasi Anda.
                                        </p>
                                    </div>
                                    <div
                                        class="flex items-center gap-space-sm bg-surface-container-low px-space-md py-space-xs rounded-xl shadow-sm">
                                        <span
                                            class="material-symbols-outlined text-primary text-[28px]">verified_user</span>
                                        <div class="flex flex-col">
                                            <span
                                                class="font-label-md text-label-md text-outline uppercase tracking-wider">Keamanan
                                                Data</span>
                                            <span
                                                class="font-title-sm text-title-sm text-on-surface font-semibold">Tersertifikasi
                                                SSL 256-bit</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Stepper Progress Bar Indicator -->

                                <!-- Main Form Layout (Grid Structure) -->
                                <form class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-start"
                                    id="preRegisterForm">
                                    <!-- Left Content Area: Form Sections (8 Cols) -->
                                    <div class="lg:col-span-8 flex flex-col gap-space-xl">
                                        <!-- SECTION 1: Identitas Pemohon -->
                                        <section class="bg-surface-container-lowest rounded-2xl p-space-xl shadow-sm">
                                            <div
                                                class="flex items-center justify-between pb-space-md mb-space-lg bg-surface-container-low -mx-space-xl -mt-space-xl p-space-xl rounded-t-2xl">
                                                <div class="flex items-center gap-space-sm">
                                                    <div
                                                        class="w-10 h-10 rounded-xl bg-primary-fixed text-primary flex items-center justify-center">
                                                        <span class="material-symbols-outlined text-[24px]">badge</span>
                                                    </div>
                                                    <div>
                                                        <h2 class="font-headline-md text-headline-md text-on-surface">
                                                            Data Identitas Pemohon
                                                        </h2>
                                                        <p class="font-body-md text-body-md text-on-surface-variant">
                                                            Pastikan data sesuai dengan Kartu Tanda Penduduk
                                                            (e-KTP) asli.
                                                        </p>
                                                    </div>
                                                </div>
                                                <span
                                                    class="font-label-md text-label-md bg-surface-variant text-on-surface-variant px-space-sm py-1 rounded-full uppercase">Wajib
                                                    Lengkap</span>
                                            </div>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-space-lg">
                                                <!-- Nama Lengkap -->
                                                <div class="md:col-span-2">
                                                    <label
                                                        class="block font-title-sm text-title-sm text-on-surface mb-space-2xs"
                                                        for="namaLengkap">
                                                        Nama Lengkap (Sesuai KTP)
                                                        <span class="text-error">*</span>
                                                    </label>
                                                    <div class="relative">
                                                        <span
                                                            class="material-symbols-outlined absolute left-3 top-3.5 text-outline text-[20px]">person</span>
                                                        <input
                                                            class="w-full pl-10 pr-4 py-3 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md placeholder:text-outline shadow-sm focus:outline-none focus:bg-surface-container-low transition-all"
                                                            id="namaLengkap" name="namaLengkap"
                                                            placeholder="Contoh: GURUH HINDARTO" required=""
                                                            type="text" />
                                                    </div>
                                                </div>
                                                <!-- NIK 16 Digit -->
                                                <div>
                                                    <label
                                                        class="block font-title-sm text-title-sm text-on-surface mb-space-2xs"
                                                        for="nik">
                                                        Nomor Induk Kependudukan (NIK)
                                                        <span class="text-error">*</span>
                                                    </label>
                                                    <div class="relative">
                                                        <span
                                                            class="material-symbols-outlined absolute left-3 top-3.5 text-outline text-[20px]">credit_card</span>
                                                        <input
                                                            class="w-full pl-10 pr-4 py-3 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md placeholder:text-outline shadow-sm focus:outline-none focus:bg-surface-container-low transition-all"
                                                            id="nik" maxlength="16" name="nik" pattern="[0-9]{16}"
                                                            placeholder="3512xxxxxxxxxxxx" required="" type="text" />
                                                    </div>
                                                    <p
                                                        class="font-label-md text-label-md text-outline mt-1 flex items-center gap-1">
                                                        <span class="material-symbols-outlined text-[14px]">info</span>
                                                        Wajib 16 digit sesuai e-KTP untuk validasi Disdukcapil
                                                    </p>
                                                </div>
                                                <!-- Jenis Kelamin -->
                                                <div>
                                                    <label
                                                        class="block font-title-sm text-title-sm text-on-surface mb-space-2xs">
                                                        Jenis Kelamin <span class="text-error">*</span>
                                                    </label>
                                                    <div
                                                        class="grid grid-cols-2 gap-space-xs p-1 bg-surface-container-low rounded-lg">
                                                        <label
                                                            class="flex items-center justify-center gap-2 py-2.5 px-3 rounded-md cursor-pointer transition-all bg-surface-container-lowest text-primary font-title-sm text-title-sm shadow-sm"
                                                            id="genderMaleLabel">
                                                            <input checked="" class="hidden" name="gender"
                                                                onchange="toggleGender(this)" type="radio"
                                                                value="Laki-laki" />
                                                            <span class="material-symbols-outlined text-[18px]">man</span>
                                                            <span>Laki-laki</span>
                                                        </label>
                                                        <label
                                                            class="flex items-center justify-center gap-2 py-2.5 px-3 rounded-md cursor-pointer transition-all text-on-surface-variant font-title-sm text-title-sm"
                                                            id="genderFemaleLabel">
                                                            <input class="hidden" name="gender"
                                                                onchange="toggleGender(this)" type="radio"
                                                                value="Perempuan" />
                                                            <span class="material-symbols-outlined text-[18px]">woman</span>
                                                            <span>Perempuan</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <!-- Tanggal Lahir -->
                                                <div>
                                                    <label
                                                        class="block font-title-sm text-title-sm text-on-surface mb-space-2xs"
                                                        for="tanggalLahir">
                                                        Tanggal Lahir <span class="text-error">*</span>
                                                    </label>
                                                    <div class="relative">
                                                        <span
                                                            class="material-symbols-outlined absolute left-3 top-3.5 text-outline text-[20px]">calendar_month</span>
                                                        <input
                                                            class="w-full pl-10 pr-4 py-3 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md shadow-sm focus:outline-none focus:bg-surface-container-low transition-all"
                                                            id="tanggalLahir" name="tanggalLahir" required=""
                                                            type="date" />
                                                    </div>
                                                </div>
                                                <!-- Nomor WhatsApp / HP -->
                                                <div>
                                                    <label
                                                        class="block font-title-sm text-title-sm text-on-surface mb-space-2xs"
                                                        for="whatsapp">
                                                        Nomor WhatsApp / HP Aktif
                                                        <span class="text-error">*</span>
                                                    </label>
                                                    <div
                                                        class="flex rounded-lg shadow-sm overflow-hidden bg-surface-container-lowest">
                                                        <span
                                                            class="inline-flex items-center px-3 bg-surface-container text-on-surface font-title-sm text-title-sm font-semibold">
                                                            <span
                                                                class="material-symbols-outlined text-primary mr-1 text-[18px]">chat</span>
                                                            +62
                                                        </span>
                                                        <input
                                                            class="w-full px-4 py-3 bg-transparent text-on-surface font-body-md text-body-md placeholder:text-outline focus:outline-none focus:bg-surface-container-low transition-all"
                                                            id="whatsapp" name="whatsapp" placeholder="812-3456-7890"
                                                            required="" type="tel" />
                                                    </div>
                                                </div>
                                                <!-- Alamat Email -->
                                                <div class="md:col-span-2">
                                                    <label
                                                        class="block font-title-sm text-title-sm text-on-surface mb-space-2xs"
                                                        for="email">
                                                        Alamat Email Aktif <span class="text-error">*</span>
                                                    </label>
                                                    <div class="relative">
                                                        <span
                                                            class="material-symbols-outlined absolute left-3 top-3.5 text-outline text-[20px]">mail</span>
                                                        <input
                                                            class="w-full pl-10 pr-4 py-3 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md placeholder:text-outline shadow-sm focus:outline-none focus:bg-surface-container-low transition-all"
                                                            id="email" name="email"
                                                            placeholder="nama.email@gmail.com" required=""
                                                            type="email" />
                                                    </div>
                                                    <p class="font-label-md text-label-md text-outline mt-1">
                                                        E-invoice bulanan dan tanda terima digital akan
                                                        dikirimkan ke email ini.
                                                    </p>
                                                </div>
                                                <!-- Upload e-KTP -->
                                                <div class="md:col-span-2">
                                                    <label
                                                        class="block font-title-sm text-title-sm text-on-surface mb-space-2xs">
                                                        Upload Foto Asli e-KTP <span class="text-error">*</span>
                                                    </label>
                                                    <div
                                                        class="p-space-lg rounded-2xl bg-surface-container-low/60 text-center cursor-pointer hover:bg-surface-container transition-all group relative">
                                                        <input accept="image/jpeg,image/png"
                                                            class="absolute inset-0 opacity-0 cursor-pointer w-full h-full"
                                                            id="ktpFile" name="ktpFile"
                                                            onchange="handleKtpUpload(this)" type="file" />
                                                        <div class="flex flex-col items-center" id="ktpPlaceholder">
                                                            <div
                                                                class="w-14 h-14 rounded-full bg-primary-fixed flex items-center justify-center text-primary group-hover:scale-110 transition-transform mb-space-xs shadow-sm">
                                                                <span
                                                                    class="material-symbols-outlined text-[30px]">add_a_photo</span>
                                                            </div>
                                                            <span
                                                                class="font-title-sm text-title-sm text-on-surface font-semibold">Tarik
                                                                &amp; Lepaskan foto e-KTP atau
                                                                <span class="text-primary underline">Pilih
                                                                    File</span></span>
                                                            <span
                                                                class="font-label-md text-label-md text-outline mt-1">Format
                                                                didukung: JPG, JPEG, PNG (Maks. 5 MB).
                                                                Pastikan teks NIK dan wajah terbaca jelas tanpa
                                                                pantulan cahaya.</span>
                                                        </div>
                                                        <div class="hidden flex items-center justify-center gap-space-sm"
                                                            id="ktpSuccess">
                                                            <span
                                                                class="material-symbols-outlined text-primary text-[32px]">check_circle</span>
                                                            <div class="text-left">
                                                                <span
                                                                    class="font-title-sm text-title-sm text-on-surface font-semibold block"
                                                                    id="ktpFileName">ktp-pemohon.jpg</span>
                                                                <span
                                                                    class="font-label-md text-label-md text-primary font-medium">Foto
                                                                    berhasil dimuat &amp; siap
                                                                    diverifikasi</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <!-- SECTION 2: Alamat & Lokasi Pemasangan -->
                                        <section class="bg-surface-container-lowest rounded-2xl p-space-xl shadow-sm">
                                            <div
                                                class="flex items-center justify-between pb-space-md mb-space-lg bg-surface-container-low -mx-space-xl -mt-space-xl p-space-xl rounded-t-2xl">
                                                <div class="flex items-center gap-space-sm">
                                                    <div
                                                        class="w-10 h-10 rounded-xl bg-tertiary-fixed text-tertiary flex items-center justify-center">
                                                        <span
                                                            class="material-symbols-outlined text-[24px]">location_on</span>
                                                    </div>
                                                    <div>
                                                        <h2 class="font-headline-md text-headline-md text-on-surface">
                                                            Alamat &amp; Lokasi Pemasangan
                                                        </h2>
                                                        <p class="font-body-md text-body-md text-on-surface-variant">
                                                            Titik terminasi optical drop core kabel fiber optik ke
                                                            rumah Anda.
                                                        </p>
                                                    </div>
                                                </div>
                                                <span
                                                    class="font-label-md text-label-md bg-tertiary-fixed text-on-tertiary-fixed font-semibold px-space-sm py-1 rounded-full uppercase">Dropcore
                                                    ODP</span>
                                            </div>
                                            <div class="space-y-space-lg">
                                                <!-- Alamat Lengkap Textarea -->
                                                <div>
                                                    <label
                                                        class="block font-title-sm text-title-sm text-on-surface mb-space-2xs"
                                                        for="alamatLengkap">
                                                        Alamat Lengkap Pemasangan
                                                        <span class="text-error">*</span>
                                                    </label>
                                                    <div class="relative">
                                                        <textarea
                                                            class="w-full p-4 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md placeholder:text-outline shadow-sm focus:outline-none focus:bg-surface-container-low transition-all resize-none"
                                                            id="alamatLengkap" name="alamat_lengkap"
                                                            placeholder="Nama Jalan, Gang, Nomor Rumah, Blok/Unit, dan patokan terdekat (contoh: depan Masjid Al-Huda atau samping Toko Berkah)"
                                                            required="" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <!-- RT / RW Grid -->
                                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-space-md">
                                                    <div>
                                                        <label
                                                            class="block font-title-sm text-title-sm text-on-surface mb-space-2xs"
                                                            for="rt">RT <span class="text-error">*</span></label>
                                                        <input
                                                            class="w-full px-4 py-3 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md shadow-sm focus:outline-none focus:bg-surface-container-low transition-all"
                                                            id="rt" name="rt" placeholder="001"
                                                            required="" type="text" />
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block font-title-sm text-title-sm text-on-surface mb-space-2xs"
                                                            for="rw">RW <span class="text-error">*</span></label>
                                                        <input
                                                            class="w-full px-4 py-3 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md shadow-sm focus:outline-none focus:bg-surface-container-low transition-all"
                                                            id="rw" name="rw" placeholder="004"
                                                            required="" type="text" />
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label
                                                            class="block font-title-sm text-title-sm text-on-surface mb-space-2xs"
                                                            for="kodePos">Kode Pos</label>
                                                        <input
                                                            class="w-full px-4 py-3 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md shadow-sm focus:outline-none focus:bg-surface-container-low transition-all"
                                                            id="kodePos" name="kodePos" placeholder="68356"
                                                            type="text" value="68356" />
                                                    </div>
                                                </div>
                                                <!-- Bertingkat Dropdown Region -->
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
                                                    <div>
                                                        <label
                                                            class="block font-title-sm text-title-sm text-on-surface mb-space-2xs"
                                                            for="provinsi">
                                                            Provinsi <span class="text-error">*</span>
                                                        </label>
                                                        <select
                                                            class="w-full px-4 py-3 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md shadow-sm focus:outline-none focus:bg-surface-container-low"
                                                            id="provinsi" name="provinsi" required>
                                                            <option value="">Memuat...</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block font-title-sm text-title-sm text-on-surface mb-space-2xs"
                                                            for="kota">
                                                            Kabupaten / Kota <span class="text-error">*</span>
                                                        </label>
                                                        <select
                                                            class="w-full px-4 py-3 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md shadow-sm focus:outline-none focus:bg-surface-container-low"
                                                            id="kota" name="kota" required disabled>
                                                            <option value="">Pilih Provinsi dahulu</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block font-title-sm text-title-sm text-on-surface mb-space-2xs"
                                                            for="kecamatan">
                                                            Kecamatan <span class="text-error">*</span>
                                                        </label>
                                                        <select
                                                            class="w-full px-4 py-3 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md shadow-sm focus:outline-none focus:bg-surface-container-low"
                                                            id="kecamatan" name="kecamatan" required disabled>
                                                            <option value="">Pilih Kota/Kabupaten dahulu</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block font-title-sm text-title-sm text-on-surface mb-space-2xs"
                                                            for="kelurahan">
                                                            Kelurahan / Desa <span class="text-error">*</span>
                                                        </label>
                                                        <select
                                                            class="w-full px-4 py-3 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md shadow-sm focus:outline-none focus:bg-surface-container-low"
                                                            id="kelurahan" name="kelurahan" required disabled>
                                                            <option value="">Pilih Kecamatan dahulu</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- GPS Pinpoint Coordinate & Interactive Map Preview -->
                                                <div>
                                                    <div class="flex items-center justify-between mb-space-2xs">
                                                        <label class="font-title-sm text-title-sm text-on-surface">
                                                            Titik Koordinat GPS / Pinpoint Pemasangan
                                                            <span class="text-error">*</span>
                                                        </label>
                                                        <button
                                                            class="inline-flex items-center gap-1 text-primary hover:text-primary-container font-label-md text-label-md font-semibold cursor-pointer"
                                                            onclick="getCurrentLocation()" type="button">
                                                            <span
                                                                class="material-symbols-outlined text-[16px]">my_location</span>
                                                            Gunakan Lokasi Saat Ini
                                                        </button>
                                                    </div>
                                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm mb-space-sm">
                                                        <div class="relative">
                                                            <span
                                                                class="material-symbols-outlined absolute left-3 top-3.5 text-outline text-[18px]">explore</span>
                                                            <input
                                                                class="w-full pl-10 pr-4 py-3 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md font-mono shadow-sm"
                                                                id="latitude" name="latitude" readonly=""
                                                                type="text" value="-7.734812" />
                                                            <span
                                                                class="absolute right-3 top-3.5 font-label-md text-label-md text-outline">Lat</span>
                                                        </div>
                                                        <div class="relative">
                                                            <span
                                                                class="material-symbols-outlined absolute left-3 top-3.5 text-outline text-[18px]">explore</span>
                                                            <input
                                                                class="w-full pl-10 pr-4 py-3 rounded-lg bg-surface-container-low text-on-surface font-body-md text-body-md font-mono shadow-sm"
                                                                id="longitude" name="longitude" readonly=""
                                                                type="text" value="113.689435" />
                                                            <span
                                                                class="absolute right-3 top-3.5 font-label-md text-label-md text-outline">Long</span>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- Catatan Khusus Lokasi -->
                                                <div>
                                                    <label
                                                        class="block font-title-sm text-title-sm text-on-surface mb-space-2xs"
                                                        for="catatanLokasi">
                                                        Catatan Khusus Teknisi Pemasangan (Opsional)
                                                    </label>
                                                    <input
                                                        class="w-full px-4 py-3 rounded-lg bg-surface-container-lowest text-on-surface font-body-md text-body-md placeholder:text-outline shadow-sm focus:outline-none focus:bg-surface-container-low transition-all"
                                                        id="catatanLokasi" name="catatanLokasi"
                                                        placeholder="Contoh: Kabel ditarik lewat plafon teras, pagar cat putih dekat pohon mangga"
                                                        type="text" />
                                                </div>
                                            </div>
                                        </section>
                                        <!-- SECTION 3: Pilihan Paket CSNet Fiber -->
                                        <section class="bg-surface-container-lowest rounded-2xl p-space-xl shadow-sm">
                                            <div
                                                class="flex items-center justify-between pb-space-md mb-space-lg bg-surface-container-low -mx-space-xl -mt-space-xl p-space-xl rounded-t-2xl">
                                                <div class="flex items-center gap-space-sm">
                                                    <div
                                                        class="w-10 h-10 rounded-xl bg-secondary-fixed text-secondary flex items-center justify-center">
                                                        <span class="material-symbols-outlined text-[24px]">speed</span>
                                                    </div>
                                                    <div>
                                                        <h2 class="font-headline-md text-headline-md text-on-surface">
                                                            Pilih Paket CSNet Ultra Fiber
                                                        </h2>
                                                        <p class="font-body-md text-body-md text-on-surface-variant">
                                                            Koneksi simetris 1:1 murni tanpa batasan FUP kuota
                                                            bulanan.
                                                        </p>
                                                    </div>
                                                </div>
                                                <span
                                                    class="font-label-md text-label-md bg-secondary-fixed text-on-secondary-fixed font-semibold px-space-sm py-1 rounded-full uppercase">100%
                                                    Fiber</span>
                                            </div>
                                            <!-- Cards Selection Grid -->
                                            {{-- <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
                                                <!-- Tier 1: 30 Mbps -->
                                                <label
                                                    class="relative rounded-xl p-space-md cursor-pointer transition-all bg-surface-container-lowest shadow-sm hover:shadow-md flex flex-col justify-between plan-card group"
                                                    onclick="selectPlan('30 Mbps', 175000, this)">
                                                    <input class="hidden" name="selectedPlan" type="radio"
                                                        value="30 Mbps" />
                                                    <div>
                                                        <div class="flex justify-between items-start mb-space-xs">
                                                            <span
                                                                class="font-label-md text-label-md text-outline font-semibold uppercase">Starter
                                                                Family</span>
                                                            <span
                                                                class="w-5 h-5 rounded-full bg-surface-container flex items-center justify-center check-indicator text-on-primary"></span>
                                                        </div>
                                                        <div class="flex items-baseline gap-1 mb-space-xs">
                                                            <span
                                                                class="font-metric-stat text-metric-stat text-on-surface font-extrabold">30</span>
                                                            <span
                                                                class="font-title-sm text-title-sm text-primary font-bold">Mbps</span>
                                                        </div>
                                                        <p
                                                            class="font-body-md text-body-md text-on-surface-variant mb-space-md">
                                                            Cocok untuk browsing, medsos &amp; 3-5 gadget aktif.
                                                        </p>
                                                        <ul
                                                            class="space-y-1.5 font-body-md text-body-md text-on-surface-variant mb-space-md">
                                                            <li class="flex items-center gap-2">
                                                                <span
                                                                    class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                                                                Simetris Unggah : Unduh (1:1)
                                                            </li>
                                                            <li class="flex items-center gap-2">
                                                                <span
                                                                    class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                                                                Bebas Batas Kuota (Tanpa FUP)
                                                            </li>
                                                            <li class="flex items-center gap-2">
                                                                <span
                                                                    class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                                                                Router ONT Dual-Band WiFi 5
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div
                                                        class="pt-space-xs border-t border-surface-container flex items-baseline justify-between">
                                                        <span class="font-title-sm text-title-sm text-primary font-bold">Rp
                                                            175.000</span>
                                                        <span class="font-label-md text-label-md text-outline">/ bulan
                                                            (Netto)</span>
                                                    </div>
                                                </label>
                                                <!-- Tier 2: 50 Mbps (POPULAR) -->
                                                <label
                                                    class="relative rounded-xl p-space-md cursor-pointer transition-all bg-surface-container-low shadow-md flex flex-col justify-between plan-card group ring-2 ring-primary"
                                                    onclick="selectPlan('50 Mbps', 250000, this)">
                                                    <input checked="" class="hidden" name="selectedPlan"
                                                        type="radio" value="50 Mbps" />
                                                    <div
                                                        class="absolute -top-3 right-4 bg-primary text-on-primary px-space-sm py-0.5 rounded-full font-label-md text-label-md font-bold uppercase tracking-wider shadow-sm">
                                                        Paling Populer
                                                    </div>
                                                    <div>
                                                        <div class="flex justify-between items-start mb-space-xs">
                                                            <span
                                                                class="font-label-md text-label-md text-primary font-bold uppercase">Gamer
                                                                &amp; Streamer</span>
                                                            <span
                                                                class="w-5 h-5 rounded-full bg-primary flex items-center justify-center check-indicator text-on-primary">
                                                                <span
                                                                    class="material-symbols-outlined text-[14px]">check</span>
                                                            </span>
                                                        </div>
                                                        <div class="flex items-baseline gap-1 mb-space-xs">
                                                            <span
                                                                class="font-metric-stat text-metric-stat text-primary font-extrabold">50</span>
                                                            <span
                                                                class="font-title-sm text-title-sm text-primary font-bold">Mbps</span>
                                                        </div>
                                                        <p
                                                            class="font-body-md text-body-md text-on-surface-variant mb-space-md">
                                                            Streaming 4K lancar, Zoom meeting, gaming ping rendah.
                                                        </p>
                                                        <ul
                                                            class="space-y-1.5 font-body-md text-body-md text-on-surface-variant mb-space-md">
                                                            <li class="flex items-center gap-2">
                                                                <span
                                                                    class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                                                                Simetris Unggah : Unduh (1:1)
                                                            </li>
                                                            <li class="flex items-center gap-2">
                                                                <span
                                                                    class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                                                                Tanpa FUP Unlimited
                                                            </li>
                                                            <li class="flex items-center gap-2">
                                                                <span
                                                                    class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                                                                Router ONT Dual-Band WiFi 6 Gigabit
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div
                                                        class="pt-space-xs border-t border-surface-variant flex items-baseline justify-between">
                                                        <span
                                                            class="font-headline-md text-headline-md text-primary font-bold">Rp
                                                            250.000</span>
                                                        <span class="font-label-md text-label-md text-outline">/ bulan
                                                            (Netto)</span>
                                                    </div>
                                                </label>
                                                <!-- Tier 3: 100 Mbps -->
                                                <label
                                                    class="relative rounded-xl p-space-md cursor-pointer transition-all bg-surface-container-lowest shadow-sm hover:shadow-md flex flex-col justify-between plan-card group"
                                                    onclick="selectPlan('100 Mbps', 375000, this)">
                                                    <input class="hidden" name="selectedPlan" type="radio"
                                                        value="100 Mbps" />
                                                    <div>
                                                        <div class="flex justify-between items-start mb-space-xs">
                                                            <span
                                                                class="font-label-md text-label-md text-outline font-semibold uppercase">Ultra
                                                                Pro</span>
                                                            <span
                                                                class="w-5 h-5 rounded-full bg-surface-container flex items-center justify-center check-indicator text-on-primary"></span>
                                                        </div>
                                                        <div class="flex items-baseline gap-1 mb-space-xs">
                                                            <span
                                                                class="font-metric-stat text-metric-stat text-on-surface font-extrabold">100</span>
                                                            <span
                                                                class="font-title-sm text-title-sm text-primary font-bold">Mbps</span>
                                                        </div>
                                                        <p
                                                            class="font-body-md text-body-md text-on-surface-variant mb-space-md">
                                                            Solusi content creator, transfer file berat, &amp;
                                                            Smart Home.
                                                        </p>
                                                        <ul
                                                            class="space-y-1.5 font-body-md text-body-md text-on-surface-variant mb-space-md">
                                                            <li class="flex items-center gap-2">
                                                                <span
                                                                    class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                                                                Simetris 100 Mbps Murni
                                                            </li>
                                                            <li class="flex items-center gap-2">
                                                                <span
                                                                    class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                                                                Tanpa FUP Kuota
                                                            </li>
                                                            <li class="flex items-center gap-2">
                                                                <span
                                                                    class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                                                                Prioritas Routing Gaming Server
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div
                                                        class="pt-space-xs border-t border-surface-container flex items-baseline justify-between">
                                                        <span class="font-title-sm text-title-sm text-primary font-bold">Rp
                                                            375.000</span>
                                                        <span class="font-label-md text-label-md text-outline">/ bulan
                                                            (Netto)</span>
                                                    </div>
                                                </label>
                                                <!-- Tier 4: 200 Mbps -->
                                                <label
                                                    class="relative rounded-xl p-space-md cursor-pointer transition-all bg-surface-container-lowest shadow-sm hover:shadow-md flex flex-col justify-between plan-card group"
                                                    onclick="selectPlan('200 Mbps', 599000, this)">
                                                    <input class="hidden" name="selectedPlan" type="radio"
                                                        value="200 Mbps" />
                                                    <div>
                                                        <div class="flex justify-between items-start mb-space-xs">
                                                            <span
                                                                class="font-label-md text-label-md text-outline font-semibold uppercase">Enterprise
                                                                Home</span>
                                                            <span
                                                                class="w-5 h-5 rounded-full bg-surface-container flex items-center justify-center check-indicator text-on-primary"></span>
                                                        </div>
                                                        <div class="flex items-baseline gap-1 mb-space-xs">
                                                            <span
                                                                class="font-metric-stat text-metric-stat text-on-surface font-extrabold">200</span>
                                                            <span
                                                                class="font-title-sm text-title-sm text-primary font-bold">Mbps</span>
                                                        </div>
                                                        <p
                                                            class="font-body-md text-body-md text-on-surface-variant mb-space-md">
                                                            Kecepatan tertinggi untuk multi-user hingga 20+
                                                            perangkat simultan.
                                                        </p>
                                                        <ul
                                                            class="space-y-1.5 font-body-md text-body-md text-on-surface-variant mb-space-md">
                                                            <li class="flex items-center gap-2">
                                                                <span
                                                                    class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                                                                Kecepatan Gahar 200 Mbps
                                                            </li>
                                                            <li class="flex items-center gap-2">
                                                                <span
                                                                    class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                                                                Router WiFi 6 High Performance
                                                            </li>
                                                            <li class="flex items-center gap-2">
                                                                <span
                                                                    class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
                                                                Dukungan Teknisi Khusus VIP
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div
                                                        class="pt-space-xs border-t border-surface-container flex items-baseline justify-between">
                                                        <span class="font-title-sm text-title-sm text-primary font-bold">Rp
                                                            599.000</span>
                                                        <span class="font-label-md text-label-md text-outline">/ bulan
                                                            (Netto)</span>
                                                    </div>
                                                </label>
                                            </div> --}}

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md" id="planGrid">
                                                <div class="col-span-2 text-center py-space-lg text-on-surface-variant">
                                                    Memuat paket layanan...
                                                </div>
                                            </div>
                                        </section>
                                        <!-- Illustrative Promo Banner Card -->
                                        <div
                                            class="bg-gradient-to-r from-primary-container to-secondary-container text-on-primary rounded-2xl p-space-lg shadow-md flex items-center justify-between gap-space-lg">
                                            <div class="flex items-center gap-space-md">
                                                <div
                                                    class="w-12 h-12 rounded-xl bg-surface-container-lowest/20 flex items-center justify-center shrink-0">
                                                    <span
                                                        class="material-symbols-outlined text-[32px] text-white">card_giftcard</span>
                                                </div>
                                                <div>
                                                    <h3 class="font-title-sm text-title-sm font-bold text-white">
                                                        Promo Pasang Baru: Gratis Biaya Instalasi!
                                                    </h3>
                                                    <p class="font-body-md text-body-md text-primary-fixed">
                                                        Hemat Rp 350.000 termasuk kabel dropcore hingga 150
                                                        meter &amp; pinjam-pakai modem.
                                                    </p>
                                                </div>
                                            </div>
                                            <span
                                                class="bg-surface-container-lowest text-primary font-label-md text-label-md font-bold px-space-md py-space-2xs rounded-full uppercase shrink-0 shadow-sm">
                                                Otomatis Terpasang
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Right Content Area: Summary Sticky Sidebar (4 Cols) -->
                                    <div class="lg:col-span-4 flex flex-col gap-space-lg sticky top-24">
                                        <!-- Summary Card -->
                                        <div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm">
                                            <h3
                                                class="font-headline-md text-headline-md text-on-surface pb-space-xs mb-space-md flex items-center justify-between">
                                                <span>Ringkasan Pengajuan</span>
                                                <span class="material-symbols-outlined text-primary">receipt_long</span>
                                            </h3>
                                            <!-- Status Cakupan Badge -->
                                            <div
                                                class="mb-space-md p-space-sm rounded-xl bg-surface-container-low flex items-center gap-space-xs">
                                                <span
                                                    class="w-3 h-3 rounded-full bg-tertiary-fixed-dim shrink-0 animate-pulse"></span>
                                                <div class="flex flex-col">
                                                    <span
                                                        class="font-label-md text-label-md text-tertiary font-bold uppercase">Cakupan
                                                        Jaringan</span>
                                                    <span
                                                        class="font-body-md text-body-md text-on-surface font-semibold">Area
                                                        Siap Terkoneksi Fiber Optic</span>
                                                </div>
                                            </div>
                                            <!-- Itemized Summary List -->
                                            <div class="space-y-space-sm font-body-md text-body-md pb-space-md">
                                                <div class="flex justify-between items-center text-on-surface-variant">
                                                    <span>Paket Dipilih:</span>
                                                    <span class="font-title-sm text-title-sm text-on-surface font-bold"
                                                        id="summaryPlanName">50 Mbps (Gamer)</span>
                                                </div>
                                                <div class="flex justify-between items-center text-on-surface-variant">
                                                    <span>Kecepatan:</span>
                                                    <span class="font-title-sm text-title-sm text-primary font-semibold"
                                                        id="summarySpeed">50 Mbps Simetris</span>
                                                </div>
                                                <div class="flex justify-between items-center text-on-surface-variant">
                                                    <span>Biaya Registrasi / Instalasi:</span>
                                                    <span
                                                        class="font-title-sm text-title-sm text-on-surface line-through text-outline">Rp
                                                        100.000</span>
                                                </div>
                                                <div class="flex justify-between items-center text-on-surface-variant">
                                                    <span>Harga Dasar:</span>
                                                    <span class="font-title-sm text-title-sm font-semibold"
                                                        id="summaryHargaDasar">Rp
                                                        0</span>
                                                </div>
                                                <div class="flex justify-between items-center text-on-surface-variant">
                                                    <span>PPN:</span>
                                                    <span class="font-title-sm text-title-sm font-semibold"
                                                        id="summaryPpn">Rp
                                                        0</span>
                                                </div>
                                                <div class="flex justify-between items-center text-on-surface-variant">
                                                    <span>BHP / USO:</span>
                                                    <span class="font-title-sm text-title-sm font-semibold"
                                                        id="summaryBhpUso">Rp
                                                        0</span>
                                                </div>
                                                <div class="flex justify-between items-center text-on-surface-variant">
                                                    <span>PPH 23:</span>
                                                    <span class="font-title-sm text-title-sm font-semibold"
                                                        id="summaryPph23">Rp
                                                        0</span>
                                                </div>
                                                <div class="flex justify-between items-center text-on-surface-variant">
                                                    <span>Peminjaman Modem Optical:</span>
                                                    <span
                                                        class="font-title-sm text-title-sm text-on-surface text-right">Gratis</span>
                                                </div>
                                            </div>
                                            <!-- Total Monthly Due -->
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
                                                            id="summaryTotalPrice">Rp 250.000</span>
                                                        <span
                                                            class="font-label-md text-label-md text-outline block">/bulan</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- T&C Checkbox -->
                                            <div class="mb-space-lg">
                                                <label class="flex items-start gap-space-xs cursor-pointer group">
                                                    <input
                                                        class="mt-1 w-4 h-4 rounded text-primary focus:ring-primary-container"
                                                        id="termsCheck" required="" type="checkbox" />
                                                    <span
                                                        class="font-body-md text-body-md text-on-surface-variant leading-relaxed select-none">
                                                        Saya menyatakan data yang diisi benar dan menyetujui
                                                        <a class="text-primary hover:underline font-semibold"
                                                            href="#">Syarat &amp; Ketentuan</a>
                                                        serta Kebijakan Privasi CSNet Ultra Fiber.
                                                    </span>
                                                </label>
                                            </div>

                                            <div style="position: absolute; left: -9999px;" aria-hidden="true">
                                                <input type="text" wire:model="website" tabindex="-1"
                                                    autocomplete="off">
                                            </div>
                                            <!-- Action CTA Buttons -->
                                            <div class="flex flex-col gap-space-xs">
                                                <button
                                                    class="w-full py-3.5 px-space-lg rounded-xl bg-primary hover:bg-primary-container text-on-primary font-title-sm text-title-sm font-bold shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-space-xs cursor-pointer"
                                                    type="submit">
                                                    <span>Kirim Pengajuan Pre-Register</span>
                                                    <span class="material-symbols-outlined text-[20px]">send</span>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- Customer Service Contact Box -->
                                        <div class="bg-surface-container-lowest rounded-2xl p-space-md shadow-sm">
                                            <div class="flex items-start gap-space-sm">
                                                <div
                                                    class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center text-primary shrink-0">
                                                    <span
                                                        class="material-symbols-outlined text-[20px]">support_agent</span>
                                                </div>
                                                <div>
                                                    <h4 class="font-title-sm text-title-sm text-on-surface font-bold">
                                                        Butuh Bantuan Registrasi?
                                                    </h4>
                                                    <p
                                                        class="font-body-md text-body-md text-on-surface-variant mt-0.5 mb-space-sm">
                                                        Tim representatif kami siap memandu proses cek area dan
                                                        berkas Anda.
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
                                        <!-- SLA Guarantee Mini Card -->
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
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const API_BASE = "http://192.168.1.42:9000/api/preregister";

                const provinsiEl = document.getElementById("provinsi");
                const kotaEl = document.getElementById("kota");
                const kecamatanEl = document.getElementById("kecamatan");
                const kelurahanEl = document.getElementById("kelurahan");

                // Guard: kalau salah satu elemen tidak ditemukan, stop & kasih tahu jelas
                if (!provinsiEl || !kotaEl || !kecamatanEl || !kelurahanEl) {
                    console.error("Dropdown wilayah tidak ditemukan di DOM:", {
                        provinsi: !!provinsiEl,
                        kota: !!kotaEl,
                        kecamatan: !!kecamatanEl,
                        kelurahan: !!kelurahanEl,
                    });
                    return; // hentikan eksekusi cascading dropdown, sisa script lain tetap jalan
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

                function renderPlanCard(item) {
                    const isPopuler = !!item.is_populer;
                    const hargaFormatted = "Rp " + Number(item.harga).toLocaleString("id-ID");

                    const fiturHtml = (item.fitur || [])
                        .map(
                            (f) => `
        <li class="flex items-center gap-2">
            <span class="material-symbols-outlined text-primary text-[18px]">check_circle</span>
            ${f}
        </li>`
                        )
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
            : ""
        }
        <input ${isPopuler ? "checked" : ""} class="hidden" name="selectedPlan" type="radio"
        value="${item.id}" data-nama="${item.nama}" data-price="${item.harga}" />
        <div>
            <div class="flex justify-between items-start mb-space-xs">
                <span class="font-label-md text-label-md text-primary font-${isPopuler ? "bold" : "semibold"} uppercase">${item.kategori ?? item.nama}</span>
                <span class="w-5 h-5 rounded-full ${isPopuler ? "bg-primary" : "bg-surface-container"} flex items-center justify-center check-indicator text-on-primary">
                    ${isPopuler ? '<span class="material-symbols-outlined text-[14px]">check</span>' : ""}
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
            <span class="font-${isPopuler ? "headline-md text-headline-md" : "title-sm text-title-sm"} text-primary font-bold">${hargaFormatted}</span>
            <span class="font-label-md text-label-md text-outline">/ bulan (Netto)</span>
        </div>
    `;
                    label.addEventListener("click", function() {
                        selectPlan(item.nama, item.harga, label, item.ppn, item.bhp_uso, item.pph_23);
                        document.getElementById("summarySpeed").textContent = item.mbps + " Mbps Simetris";
                    });

                    return label;
                }

                async function loadLayananFrontend() {
                    try {
                        const res = await fetch(`${API_BASE}/layanan`, {
                            headers: {
                                Accept: "application/json"
                            }
                        });
                        const json = await res.json();
                        const data = json.data || [];

                        planGridEl.innerHTML = "";

                        if (data.length === 0) {
                            planGridEl.innerHTML =
                                '<div class="col-span-2 text-center py-space-lg text-on-surface-variant">Belum ada paket tersedia.</div>';
                            return;
                        }

                        data.forEach((item) => {
                            planGridEl.appendChild(renderPlanCard(item));
                        });

                        // Set summary sidebar sesuai paket yang otomatis ter-checked (is_populer / pertama)
                        const defaultItem = data.find((i) => i.is_populer) || data[0];
                        document.getElementById("summaryPlanName").textContent = defaultItem.nama;
                        document.getElementById("summarySpeed").textContent = defaultItem.nama + " Simetris";
                        document.getElementById("summaryTotalPrice").textContent =
                            "Rp " + Number(defaultItem.harga + defaultItem.ppn + defaultItem.bhp_uso + defaultItem
                                .pph_23).toLocaleString("id-ID");
                        document.getElementById("summaryHargaDasar").textContent =
                            "Rp " + Number(defaultItem.harga).toLocaleString("id-ID");
                        document.getElementById("summaryPpn").textContent =
                            "Rp " + Number(defaultItem.ppn).toLocaleString("id-ID");
                        document.getElementById("summaryBhpUso").textContent =
                            "Rp " + Number(defaultItem.bhp_uso).toLocaleString("id-ID");
                        document.getElementById("summaryPph23").textContent =
                            "Rp " + Number(defaultItem.pph_23).toLocaleString("id-ID");
                    } catch (err) {
                        planGridEl.innerHTML =
                            '<div class="col-span-2 text-center py-space-lg text-error">Gagal memuat paket layanan.</div>';
                        console.error(err);
                    }
                }

                loadLayananFrontend();

            });
            // Interactive Gender Selection
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

            // Interactive Plan Selection
            function selectPlan(planName, price, cardElement, ppn, bhpUso, pph23) {
                // Reset all plan cards
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

                // Highlight selected card
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

                // Check the hidden radio input
                const radio = cardElement.querySelector('input[type="radio"]');
                if (radio) radio.checked = true;

                // Update Summary Sidebar
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

            // File Upload Feedback
            function handleKtpUpload(input) {
                if (input.files && input.files[0]) {
                    const file = input.files[0];
                    document.getElementById("ktpPlaceholder").classList.add("hidden");
                    const successBox = document.getElementById("ktpSuccess");
                    successBox.classList.remove("hidden");
                    document.getElementById("ktpFileName").textContent = file.name;
                }
            }

            // Geolocation trigger
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
                            // Fallback location for Besuki Situbondo
                            document.getElementById("latitude").value = "-7.734812";
                            document.getElementById("longitude").value = "113.689435";
                        },
                    );
                }
            }

            // Form submission handler
            document
                .getElementById("preRegisterForm")
                .addEventListener("submit", async function(e) {
                    e.preventDefault();

                    const form = e.target;
                    const terms = document.getElementById("termsCheck");
                    const submitButton = form.querySelector('button[type="submit"]');

                    // Check terms
                    if (!terms.checked) {
                        alert("Harap setujui Syarat & Ketentuan berlangganan.");
                        return;
                    }

                    // Create FormData automatically from form inputs
                    const formData = new FormData(form);

                    // Optional: Change field names to match Laravel database/API
                    formData.append(
                        "nama_lengkap",
                        document.getElementById("namaLengkap").value
                    );

                    formData.append(
                        "tanggal_lahir",
                        document.getElementById("tanggalLahir").value
                    );

                    formData.append(
                        "jenis_kelamin",
                        form.querySelector('input[name="gender"]:checked')?.value || ""
                    );

                    formData.append(
                        "paket",
                        form.querySelector('input[name="selectedPlan"]:checked')?.value || ""
                    );

                    // Add file explicitly
                    const ktpFile = document.getElementById("ktpFile").files[0];

                    if (ktpFile) {
                        formData.set("ktp", ktpFile);
                    }

                    // Prevent multiple submissions
                    submitButton.disabled = true;
                    submitButton.innerHTML = `
                                    <span class="material-symbols-outlined animate-spin">
                                        progress_activity
                                    </span>
                                    <span>Mengirim...</span>
                                `;

                    try {
                        const response = await fetch("http://192.168.1.42:9000/api/preregister", {
                            // const response = await fetch("/api/preregister", {
                            method: "POST",
                            body: formData,
                            headers: {
                                Accept: "application/json"
                            }
                        });

                        const result = await response.json();

                        if (!response.ok) {
                            // Laravel validation error
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

                        // Success
                        alert(
                            result.message ||
                            "Pendaftaran Pre-Register berhasil dikirim! Tim kami akan menghubungi Anda."
                        );

                        console.log("Pre-register success:", result);

                        // Optional: Reset form
                        form.reset();

                        document.getElementById("summaryPlanName").textContent = "-";
                        document.getElementById("summarySpeed").textContent = "-";
                        document.getElementById("summaryTotalPrice").textContent = "Rp 0";
                        document.getElementById("summaryHargaDasar").textContent = "Rp 0";
                        document.getElementById("summaryPpn").textContent = "Rp 0";
                        document.getElementById("summaryBhpUso").textContent = "Rp 0";
                        document.getElementById("summaryPph23").textContent = "Rp 0";

                        // Optional redirect
                        // window.location.href = "/preregister/success";

                    } catch (error) {
                        console.error("Request error:", error);

                        alert(
                            "Tidak dapat terhubung ke server. Silakan coba kembali."
                        );
                    } finally {
                        submitButton.disabled = false;
                        submitButton.innerHTML = `
                                        <span>Kirim Pengajuan Pre-Register</span>
                                        <span class="material-symbols-outlined text-[20px]">
                                            send
                                        </span>
                                    `;
                    }
                });
        </script>
    @endpush
@endsection
