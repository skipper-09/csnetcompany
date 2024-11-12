<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        html,
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-image: url('{{ public_path('backend/img/spk.jpg') }}');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .content {
            margin: 20px;
        }

        .footer {
            margin-top: 40px;
        }

        .signatures {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>SURAT TUGAS PEMASANGAN RETAIL</h2>
        <p>NO: {{ $letter_number }}</p>
    </div>

    <div class="content">
        <p>Pada Hari {{ Carbon\Carbon::parse($data['date'])->isoFormat('dddd') }}
            Tanggal {{ Carbon\Carbon::parse($data['date'])->isoFormat('D MMMM Y') }},
            bersama dengan Surat ini Perusahaan Memberikan Tugas Pemasangan kepada:</p>

        <p>Nama: {{ $data['technician_name'] }}</p>
        <p>Jabatan: {{ $data['technician_position'] }}</p>

        <p>Dengan Melampirkan data Calon Client sebagai Berikut:</p>
        <p>Nama: {{ $data['client_name'] }}</p>
        <p>NIK: {{ $data['client_nik'] }}</p>
        <p>Alamat: {{ $data['client_address'] }}</p>
        <p>No WhatsApp: {{ $data['client_whatsapp'] }}</p>
        <p>Paket: {{ $data['package'] }}</p>

        <p>Detail Perangkat terpasang:</p>
        <p>Modem: {{ $data['modem_serial'] }}</p>
        <p>Kabel: {{ $data['cable_details'] }}</p>
        <p>STB: {{ $data['stb_status'] }}
            @if ($data['stb_status'] === 'Ada')
                (MAC Address: {{ $data['stb_mac_address'] }})
            @endif
        </p>

        <!-- Terms and conditions section -->
        <h4>Syarat dan Ketentuan:</h4>
        <ol>
            <!-- Include all terms and conditions as in the original document -->
        </ol>

        <div class="signatures">
            <div>
                <p>Tanda Tangan Teknisi</p>
                <br><br>
                <p>{{ $data['technician_name'] }}</p>
            </div>
            <div>
                <p>Tanda Tangan Client</p>
                <br><br>
                <p>{{ $data['client_name'] }}</p>
            </div>
        </div>
    </div>
</body>

</html>
