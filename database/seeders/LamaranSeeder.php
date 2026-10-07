<?php

namespace Database\Seeders;

use App\Enums\Karir\JenjangPendidikan;
use App\Enums\Karir\StatusLamaran;
use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Database\Seeder;

class LamaranSeeder extends Seeder
{
    public function run(): void
    {
        $lowongan = Lowongan::pluck('id', 'slug');

        $data = [
            [
                'lowongan_id'         => $lowongan['network-engineer'] ?? null,
                'nama_lengkap'        => 'Budi Santoso',
                'email'               => 'budi@email.com',
                'telepon'             => '081234567890',
                'tempat_lahir'        => 'Banyuwangi',
                'tanggal_lahir'       => '1998-01-12',
                'jenis_kelamin'       => 'L',
                'domisili'            => 'Banyuwangi',
                'pendidikan_terakhir' => JenjangPendidikan::S1,
                'nama_institusi'      => 'Universitas Jember',
                'jurusan'             => 'Teknik Informatika',
                'tahun_masuk'         => 2020,
                'tahun_lulus'         => 2024,
                'ipk'                 => 3.70,
                'punya_pengalaman'    => true,
                'pengalaman'          => [
                    ['nama_perusahaan' => 'PT XYZ Network', 'posisi' => 'Network Engineer', 'mulai' => '2024-03', 'selesai' => '2025-06', 'deskripsi' => 'Mengelola jaringan backbone dan perangkat MikroTik.'],
                ],
                'status'              => StatusLamaran::Baru,
            ],
            [
                'lowongan_id'         => $lowongan['teknisi-lapangan-ftth'] ?? null,
                'nama_lengkap'        => 'Rizky Pratama',
                'email'               => 'rizky.pratama@email.com',
                'telepon'             => '085712345678',
                'tempat_lahir'        => 'Genteng',
                'tanggal_lahir'       => '2001-05-20',
                'jenis_kelamin'       => 'L',
                'domisili'            => 'Banyuwangi',
                'pendidikan_terakhir' => JenjangPendidikan::SMK,
                'nama_institusi'      => 'SMKN 1 Glagah',
                'jurusan'             => 'Teknik Komputer Jaringan',
                'tahun_masuk'         => 2016,
                'tahun_lulus'         => 2019,
                'punya_pengalaman'    => true,
                'pengalaman'          => [
                    ['nama_perusahaan' => 'CV Mitra Fiber', 'posisi' => 'Teknisi FO', 'mulai' => '2020-01', 'selesai' => null, 'deskripsi' => 'Instalasi dan splicing jaringan FTTH.'],
                ],
                'status'              => StatusLamaran::Interview,
                'catatan_hr'          => 'Jadwal interview Kamis 10.00 WIB.',
            ],
            [
                'lowongan_id'         => $lowongan['customer-service'] ?? null,
                'nama_lengkap'        => 'Siti Aminah',
                'email'               => 'siti.aminah@email.com',
                'telepon'             => '082233445566',
                'tempat_lahir'        => 'Jember',
                'tanggal_lahir'       => '2000-09-03',
                'jenis_kelamin'       => 'P',
                'domisili'            => 'Jember',
                'pendidikan_terakhir' => JenjangPendidikan::D3,
                'nama_institusi'      => 'Politeknik Negeri Jember',
                'jurusan'             => 'Manajemen Informatika',
                'tahun_masuk'         => 2018,
                'tahun_lulus'         => 2021,
                'ipk'                 => 3.45,
                'punya_pengalaman'    => false,
                'status'              => StatusLamaran::Direview,
            ],
            [
                'lowongan_id'         => $lowongan['sales-marketing'] ?? null,
                'nama_lengkap'        => 'Dewi Lestari',
                'email'               => 'dewi.lestari@email.com',
                'telepon'             => '081398765432',
                'jenis_kelamin'       => 'P',
                'domisili'            => 'Jember',
                'pendidikan_terakhir' => JenjangPendidikan::SMA,
                'nama_institusi'      => 'SMAN 2 Jember',
                'tahun_lulus'         => 2018,
                'punya_pengalaman'    => true,
                'pengalaman'          => [
                    ['nama_perusahaan' => 'PT Maju Retail', 'posisi' => 'Sales Executive', 'mulai' => '2019-02', 'selesai' => '2024-12', 'deskripsi' => 'Penjualan produk ke pelanggan retail.'],
                ],
                'status'              => StatusLamaran::Ditolak,
                'catatan_hr'          => 'Domisili tidak sesuai area penempatan.',
            ],
            // Lamaran spontan
            [
                'lowongan_id'         => null,
                'posisi_diminati'     => 'Web Developer',
                'pesan'               => 'Saya tertarik bergabung sebagai Web Developer, berpengalaman dengan Laravel dan Livewire.',
                'nama_lengkap'        => 'Andi Wijaya',
                'email'               => 'andi.wijaya@email.com',
                'telepon'             => '087812341234',
                'domisili'            => 'Banyuwangi',
                'pendidikan_terakhir' => JenjangPendidikan::S1,
                'nama_institusi'      => 'Universitas Brawijaya',
                'jurusan'             => 'Sistem Informasi',
                'tahun_lulus'         => 2023,
                'punya_pengalaman'    => false,
                'status'              => StatusLamaran::Baru,
            ],
        ];

        foreach ($data as $item) {
            Lamaran::updateOrCreate(
                ['email' => $item['email']],
                array_merge($item, [
                    'dokumen'    => ['cv' => 'lamaran/contoh/cv.pdf'],
                    'dikirim_at' => now()->subDays(rand(0, 10)),
                ])
            );
        }
    }
}