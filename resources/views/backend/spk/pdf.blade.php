<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BOOTSTRAP CSS -->
    <link href="{{ asset('front-end/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('{{ public_path('backend/img/spk.jpg') }}');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .header {
            font-size: 12px;
            text-align: center;
            margin-top: 8rem;
        }

        .w-700 {
            font-weight: bold;
        }

        .content {
            margin-left: 5rem;
            margin-right: 5rem;
        }

        .content .section {
            font-size: 12px;
        }

        /* Gaya untuk bagian informasi klien dan perangkat */
        .info-container {
            width: 100%;
            margin-top: 1rem;
            page-break-inside: avoid;
        }

        .info-column {
            width: 45%;
            float: left;
            font-size: 12px;
        }

        .info-column:first-child {
            margin-right: 10%;
        }

        .info-column p {
            margin: 5px 0;
        }

        .content .terms-conditions {
            font-size: 12px;
            clear: both;
            padding-top: 1rem;
        }

        .terms-conditions h4 {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .terms-conditions ol {
            margin-left: 20px;
            padding-left: 0;
        }

        .terms-conditions li {
            margin-bottom: 0.5rem;
        }

        /* DomPDF compatible signature styles */
        .signatures-row {
            width: 100%;
            margin-top: 0.5rem;
            page-break-inside: avoid;
        }

        .signature-column {
            width: 45%;
            float: left;
            text-align: center;
            font-size: 12px;
        }

        .signature-column .signature {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .signature-column:first-child {
            margin-right: 10%;
        }

        .signature-line {
            width: 100%;
            margin: 4rem auto 0.5rem auto;
            border-bottom: 1px solid black;
        }

        /* Clear float */
        .clear {
            clear: both;
        }
    </style>
</head>

<body>
    <div class="header">
        <p class="w-700">SURAT TUGAS PEMASANGAN RETAIL</p>
        <p class="w-700">NO: {{ $letter_number }}</p>
    </div>

    <div class="content">
        <div class="section">
            <p>Pada hari {{ Carbon\Carbon::parse($data['date'])->translatedFormat('l') }}
                tanggal {{ Carbon\Carbon::parse($data['date'])->translatedFormat('d F Y') }},
                bersama dengan Surat ini Perusahaan memberikan Tugas Pemasangan kepada:</p>
            <p>Tanggal: {{ Carbon\Carbon::parse($data['date_install'])->translatedFormat('d F Y') }}</p>
            <p>Nama: {{ $data['technician_name'] }}</p>
            <p>Jabatan: {{ $data['technician_position'] }}</p>

            <div class="info-container">
                <div class="info-column">
                    <p><strong>Dengan Melampirkan data Calon Client sebagai Berikut:</strong></p>
                    <p>Nama: {{ $data['client_name'] }}</p>
                    <p>NIK: {{ $data['client_nik'] }}</p>
                    <p>Alamat: {{ $data['client_address'] }}</p>
                    <p>No WhatsApp: {{ $data['client_whatsapp'] }}</p>
                    <p>Paket: {{ $data['package'] }}</p>
                </div>

                <div class="info-column">
                    <p><strong>Detail Perangkat terpasang:</strong></p>
                    <p>Modem: {{ $data['modem_serial'] }} / Serial Number</p>
                    <p>Kabel: {{ $data['cable_details'] }}</p>
                    <p>STB: {{ $data['stb_status'] }}
                        @if ($data['stb_status'] === 'Ada')
                            (MAC Address: {{ $data['stb_mac_address'] }})
                        @endif
                    </p>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <!-- Terms and conditions section -->
        <div class="terms-conditions">
            <h4>Syarat dan Ketentuan:</h4>
            <ol type="1">
                <li>Modem adalah milik <strong>CSNET</strong> yang disewakan kepada PELANGGAN dan akan dikembalikan jika
                    PELANGGAN berhenti berlangganan dengan CSNET.</li>
                <li>Kerusakan alat (modem) yang disebabkan oleh kendala teknis akan menjadi tanggung jawab CSNET.</li>
                <li>Kerusakan/Kehilangan alat (modem & STB) yang disebabkan oleh <strong>PELANGGAN</strong> akan
                    dibebankan
                    kepada <strong>PELANGGAN.</strong> Dengan biaya kerusakan sebesar 50.000/biaya kehilangan sebesar
                    300.000.</li>
                <li>Apabila lewat 1 hari setelah Jatuh Tempo belum ada pembayaran maka sambungan internet akan dimatikan
                    dan
                    dihidupkan kembali ketika Pelanggan sudah melakukan Pembayaran.</li>
                <li>Sistem Pembayaran CSNET menggunakan system Prabayar (Bayar di awal).</li>
                <li>Upgrade dan Dowgrade Layanan dilakukan sesuai dengan tanggal Jatuh Tempo.</li>
                <li>PELANGGAN yang ingin putus berlangganan dengan <strong>CSNET</strong> wajib melakukan pemberitahuan
                    1
                    bulan sebelumnya. Jika <strong>PELANGGAN</strong> tidak melakukan pemberitahuan, maka
                    <strong>PELANGGAN</strong> wajib membayar tagihan di bulan berjalan.
                </li>
                <li>Jangka waktu berlangganan minimal adalah 3 bulan, jika <strong>PELANGGAN</strong> memutuskan
                    langganan
                    sebelum 3 bulan maka <strong>PELANGGAN</strong> wajib melunasi biaya berlangganan selama 3 bulan.
                </li>
                <li>Layanan home dan bussiness <strong>TIDAK BOLEH</strong> diperjual belikan, jika
                    <strong>PELANGGAN</strong> melanggar maka akan dikenakan denda Rp. 25.000.000,00-
                </li>
                <li>Pelanggan Wajib untuk Mendampingi team teknisi setiap kegiatan Instalasi Pelayanan Internet dan IPTV
                    berlangsung bertujuan untuk menghindari hal hal yang tidak di inginkan, Segala bentuk kehilangan
                    bukan
                    tanggung Jawab IDNET.</li>
            </ol>
        </div>

        <div class="signatures-row">
            <div class="signature-column">
                <p><strong>Tanda Tangan Teknisi</strong></p>
                <img class="signature" src="{{ public_path('storage/' . $data['technician_signature_path']) }}" width="300">
                <p><i>{{ $data['technician_name'] }}</i></p>
            </div>
            <div class="signature-column">
                <p><strong>Tanda Tangan Client</strong></p>
                <img class="signature" src="{{ public_path('storage/' . $data['client_signature_path']) }}" width="300">
                <p><i>{{ $data['client_name'] }}</i></p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</body>

</html>
