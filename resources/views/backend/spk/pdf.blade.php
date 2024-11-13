<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-image: url('{{ public_path('backend/img/spk.jpg') }}');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .header {
            text-align: center;
            margin-top: 10rem;
            margin-bottom: 30px;
        }

        .content {
            margin-left: 5rem;
            margin-right: 5rem;
        }

        .content p {
            font-size: 14px;
        }

        .content .terms-conditions {
            font-size: 12px;
        }

        .signatures {
            display: flex;
            justify-content: space-between;
            /* Adds space between each signature */
            gap: 20px;
            /* Optional: Adds space between the columns */
        }

        .signature {
            flex: 1;
            /* Makes each signature take up equal width */
            text-align: center;
            border-top: 1px solid #000;
            /* Optional: Add a line for signature */
            padding-top: 20px;
            /* Space above the line */
        }


        .signature p {
            font-style: italic;
            font-weight: bold;
            margin-top: 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>SURAT TUGAS PEMASANGAN RETAIL</h2>
        <p>NO: {{ $letter_number }}</p>
    </div>

    <div class="content">
        <p>Pada Hari {{ Carbon\Carbon::parse($data['date'])->translatedFormat('l') }}
            Tanggal {{ Carbon\Carbon::parse($data['date'])->translatedFormat('d F Y') }},
            bersama dengan Surat ini Perusahaan Memberikan Tugas Pemasangan kepada:</p>

        <p>Tanggal: {{ Carbon\Carbon::parse($data['date_install'])->translatedFormat('d F Y') }}</p>
        <p>Nama: {{ $data['technician_name'] }}</p>
        <p>Jabatan: {{ $data['technician_position'] }}</p>

        <p>Dengan Melampirkan data Calon Client sebagai Berikut:</p>
        <p>Nama: {{ $data['client_name'] }}</p>
        <p>NIK: {{ $data['client_nik'] }}</p>
        <p>Alamat: {{ $data['client_address'] }}</p>
        <p>No WhatsApp: {{ $data['client_whatsapp'] }}</p>
        <p>Paket: {{ $data['package'] }}</p>

        <p>Detail Perangkat terpasang:</p>
        <p>Modem: {{ $data['modem_serial'] }} / Serial Number</p>
        <p>Kabel: {{ $data['cable_details'] }}</p>
        <p>STB: {{ $data['stb_status'] }}
            @if ($data['stb_status'] === 'Ada')
                (MAC Address: {{ $data['stb_mac_address'] }})
            @endif
        </p>

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
                <li>
                    Sistem Pembayaran CSNET menggunakan system Prabayar (Bayar di awal).
                </li>
                <li>
                    Upgrade dan Dowgrade Layanan dilakukan sesuai dengan tanggal Jatuh Tempo.
                </li>
                <li>
                    PELANGGAN yang ingin putus berlangganan dengan <strong>CSNET</strong> wajib melakukan pemberitahuan
                    1
                    bulan sebelumnya. Jika <strong>PELANGGAN</strong> tidak melakukan pemberitahuan, maka
                    <strong>PELANGGAN</strong> wajib membayar tagihan di bulan berjalan.
                </li>
                <li>
                    Jangka waktu berlangganan minimal adalah 3 bulan, jika <strong>PELANGGAN</strong> memutuskan
                    langganan
                    sebelum 3 bulan
                    maka <strong>PELANGGAN</strong> wajib melunasi biaya berlangganan selama 3 bulan.
                </li>
                <li>Layanan home dan bussiness <strong>TIDAK BOLEH</strong> diperjual belikan, jika
                    <strong>PELANGGAN</strong> melanggar maka akan dikenakan denda Rp. 25.000.000,00-
                </li>
                <li>
                    Pelanggan Wajib untuk Mendampingi team teknisi setiap kegiatan Instalasi Pelayanan Internet dan IPTV
                    berlangsung bertujuan untuk menghindari hal hal yang tidak di inginkan, Segala bentuk kehilangan
                    bukan
                    tanggung Jawab IDNET.

                </li>
            </ol>
        </div>

        <div class="signatures">
            <div class="signature">
                <p>Tanda Tangan Teknisi</p>
                <br><br>
                {{-- <p>{{ $data['technician_name'] }}</p> --}}
            </div>
            <div class="signature">
                <p>Tanda Tangan Client</p>
                <br><br>
                {{-- <p>{{ $data['client_name'] }}</p> --}}
            </div>
        </div>
    </div>
</body>

</html>
