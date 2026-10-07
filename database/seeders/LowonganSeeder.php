<?php

namespace Database\Seeders;

use App\Enums\Karir\StatusLowongan;
use App\Enums\Karir\TipeKerja;
use App\Models\Lowongan;
use Illuminate\Database\Seeder;

class LowonganSeeder extends Seeder
{
    public function run(): void
    {
        $benefitUmum = [
            ['icon' => 'wallet', 'nama' => 'Gaji Kompetitif'],
            ['icon' => 'shield', 'nama' => 'BPJS Kesehatan & Ketenagakerjaan'],
            ['icon' => 'award',  'nama' => 'Pelatihan & Sertifikasi'],
            ['icon' => 'chart',  'nama' => 'Jenjang Karir'],
        ];

        $data = [
            // ===== IT & NETWORK =====
            [
                'judul'      => 'Network Engineer',
                'slug'       => 'network-engineer',
                'departemen' => 'IT & Network',
                'lokasi'     => 'Banyuwangi',
                'tipe_kerja' => TipeKerja::FullTime,
                'icon'       => 'wifi',
                'ringkasan'  => 'Mengelola dan memonitor infrastruktur jaringan CSNET.',
                'deskripsi'  => 'Bergabunglah sebagai Network Engineer untuk mengelola, memonitor, dan memastikan kinerja jaringan CSNET yang stabil dan handal.',
                'tanggung_jawab' => [
                    'Mengelola dan memonitor perangkat jaringan (Router, Switch, OLT, dll)',
                    'Melakukan troubleshooting dan optimasi jaringan',
                    'Berkoordinasi dengan tim operasi dan NOC',
                    'Membuat dokumentasi jaringan dan laporan berkala',
                    'Mengikuti perkembangan teknologi jaringan',
                ],
                'kualifikasi' => [
                    'Minimal D3/S1 Teknik Informatika, Telekomunikasi, atau sejenisnya',
                    'Memiliki pengalaman minimal 1 tahun (fresh graduate dipersilakan)',
                    'Memahami networking (Routing, Switching, TCP/IP)',
                    'Memiliki sertifikasi menjadi nilai tambah (MTCNA, CCNA, dll)',
                    'Mampu bekerja dalam tim dan memiliki komunikasi yang baik',
                ],
            ],
            [
                'judul'      => 'Staff NOC',
                'slug'       => 'staff-noc',
                'departemen' => 'IT & Network',
                'lokasi'     => 'Banyuwangi',
                'tipe_kerja' => TipeKerja::FullTime,
                'icon'       => 'monitor',
                'ringkasan'  => 'Memantau kondisi jaringan 24/7 dan merespons gangguan.',
                'deskripsi'  => 'Bertugas di Network Operation Center untuk memastikan seluruh layanan jaringan CSNET berjalan optimal setiap saat.',
                'tanggung_jawab' => [
                    'Memonitor trafik dan status perangkat jaringan',
                    'Mendeteksi dan mengeskalasi gangguan ke tim terkait',
                    'Mencatat insiden dan membuat laporan shift',
                ],
                'kualifikasi' => [
                    'Minimal D3 Teknik Informatika / Telekomunikasi',
                    'Memahami dasar jaringan dan monitoring tools (Zabbix, The Dude, dll)',
                    'Bersedia bekerja dengan sistem shift',
                ],
            ],
            [
                'judul'      => 'Magang Teknisi Jaringan',
                'slug'       => 'magang-teknisi-jaringan',
                'departemen' => 'IT & Network',
                'lokasi'     => 'Genteng',
                'tipe_kerja' => TipeKerja::Magang,
                'icon'       => 'wifi',
                'ringkasan'  => 'Program magang untuk siswa/mahasiswa bidang jaringan.',
                'deskripsi'  => 'Kesempatan belajar langsung di lapangan bersama tim jaringan CSNET selama 3-6 bulan.',
                'tanggung_jawab' => [
                    'Membantu tim dalam konfigurasi perangkat jaringan',
                    'Ikut serta dalam instalasi dan maintenance',
                    'Membuat laporan kegiatan magang',
                ],
                'kualifikasi' => [
                    'Siswa SMK TKJ atau mahasiswa aktif jurusan terkait',
                    'Memiliki surat pengantar dari sekolah/kampus',
                    'Memiliki minat belajar yang tinggi',
                ],
            ],

            // ===== IT / SOFTWARE =====
            [
                'judul'      => 'IT Support',
                'slug'       => 'it-support',
                'departemen' => 'IT',
                'lokasi'     => 'Surabaya',
                'tipe_kerja' => TipeKerja::FullTime,
                'icon'       => 'monitor',
                'ringkasan'  => 'Support infrastruktur IT dan sistem internal.',
                'deskripsi'  => 'Mendukung kelancaran operasional IT dan sistem internal perusahaan.',
                'tanggung_jawab' => [
                    'Menangani masalah hardware dan software karyawan',
                    'Melakukan maintenance perangkat komputer dan jaringan kantor',
                    'Mengelola akun dan akses sistem internal',
                ],
                'kualifikasi' => [
                    'Minimal D3 Teknik Informatika',
                    'Memahami instalasi OS dan troubleshooting hardware',
                    'Memahami dasar jaringan komputer',
                ],
            ],
            [
                'judul'      => 'Web Developer (Laravel)',
                'slug'       => 'web-developer-laravel',
                'departemen' => 'IT',
                'lokasi'     => 'Banyuwangi',
                'tipe_kerja' => TipeKerja::FullTime,
                'icon'       => 'code',
                'ringkasan'  => 'Mengembangkan aplikasi internal dan portal pelanggan.',
                'deskripsi'  => 'Membangun dan memelihara aplikasi web CSNET seperti sistem billing, portal pelanggan, dan dashboard internal.',
                'tanggung_jawab' => [
                    'Mengembangkan fitur baru menggunakan Laravel & Livewire',
                    'Memelihara dan mengoptimalkan aplikasi yang sudah berjalan',
                    'Berkolaborasi dengan tim desain dan operasional',
                ],
                'kualifikasi' => [
                    'Minimal D3/S1 Teknik Informatika atau portofolio setara',
                    'Menguasai PHP, Laravel, MySQL, dan Tailwind CSS',
                    'Terbiasa menggunakan Git',
                ],
            ],
            [
                'judul'      => 'Mobile Developer (Flutter)',
                'slug'       => 'mobile-developer-flutter',
                'departemen' => 'IT',
                'lokasi'     => 'Surabaya',
                'tipe_kerja' => TipeKerja::Kontrak,
                'icon'       => 'smartphone',
                'ringkasan'  => 'Mengembangkan aplikasi mobile pelanggan CSNET.',
                'deskripsi'  => 'Membangun aplikasi mobile untuk pelanggan dan teknisi lapangan CSNET.',
                'tanggung_jawab' => [
                    'Mengembangkan aplikasi Android & iOS dengan Flutter',
                    'Integrasi aplikasi dengan REST API',
                    'Melakukan testing dan publikasi ke Play Store / App Store',
                ],
                'kualifikasi' => [
                    'Berpengalaman minimal 1 tahun dengan Flutter',
                    'Memahami state management (Bloc, Provider, atau Riverpod)',
                    'Memiliki portofolio aplikasi yang sudah rilis',
                ],
            ],
            [
                'judul'      => 'UI/UX Designer',
                'slug'       => 'ui-ux-designer',
                'departemen' => 'IT',
                'lokasi'     => 'Banyuwangi',
                'tipe_kerja' => TipeKerja::Freelance,
                'icon'       => 'pen',
                'ringkasan'  => 'Merancang tampilan aplikasi web dan mobile CSNET.',
                'deskripsi'  => 'Mendesain antarmuka yang mudah digunakan untuk produk digital CSNET.',
                'tanggung_jawab' => [
                    'Membuat wireframe, mockup, dan prototype',
                    'Melakukan riset kebutuhan pengguna',
                    'Menyusun design system dan komponen UI',
                ],
                'kualifikasi' => [
                    'Menguasai Figma',
                    'Memahami prinsip UI/UX dan responsive design',
                    'Memiliki portofolio desain aplikasi',
                ],
            ],

            // ===== OPERASIONAL =====
            [
                'judul'      => 'Teknisi Lapangan FTTH',
                'slug'       => 'teknisi-lapangan-ftth',
                'departemen' => 'Operasional',
                'lokasi'     => 'Banyuwangi',
                'tipe_kerja' => TipeKerja::FullTime,
                'icon'       => 'wrench',
                'ringkasan'  => 'Instalasi, perawatan, dan troubleshooting jaringan FTTH.',
                'deskripsi'  => 'Bertanggung jawab atas instalasi dan perawatan jaringan fiber optik ke rumah pelanggan.',
                'tanggung_jawab' => [
                    'Melakukan instalasi pemasangan baru pelanggan FTTH',
                    'Melakukan perbaikan gangguan jaringan di lapangan',
                    'Melakukan splicing dan terminasi kabel fiber optik',
                    'Membuat laporan pekerjaan harian',
                ],
                'kualifikasi' => [
                    'Minimal SMK Teknik Komputer Jaringan / Elektro',
                    'Mampu menggunakan alat splicer dan OPM',
                    'Memiliki SIM C dan kendaraan pribadi',
                    'Tidak takut ketinggian',
                ],
            ],
            [
                'judul'      => 'Teknisi Lapangan FTTH - Jember',
                'slug'       => 'teknisi-lapangan-ftth-jember',
                'departemen' => 'Operasional',
                'lokasi'     => 'Jember',
                'tipe_kerja' => TipeKerja::FullTime,
                'icon'       => 'wrench',
                'ringkasan'  => 'Instalasi dan perbaikan jaringan FTTH area Jember.',
                'deskripsi'  => 'Mendukung ekspansi jaringan CSNET di wilayah Jember dan sekitarnya.',
                'tanggung_jawab' => [
                    'Melakukan pemasangan baru pelanggan area Jember',
                    'Menangani laporan gangguan pelanggan',
                    'Melakukan perawatan rutin ODP dan kabel distribusi',
                ],
                'kualifikasi' => [
                    'Minimal SMK sederajat',
                    'Berdomisili di Jember atau sekitarnya',
                    'Memiliki SIM C dan kendaraan pribadi',
                ],
            ],
            [
                'judul'      => 'Teknisi Splicer Fiber Optik',
                'slug'       => 'teknisi-splicer-fiber-optik',
                'departemen' => 'Operasional',
                'lokasi'     => 'Situbondo',
                'tipe_kerja' => TipeKerja::Kontrak,
                'icon'       => 'wrench',
                'ringkasan'  => 'Penyambungan kabel fiber optik untuk proyek backbone.',
                'deskripsi'  => 'Bertugas melakukan splicing dan pengukuran kabel fiber optik pada proyek pembangunan jaringan backbone.',
                'tanggung_jawab' => [
                    'Melakukan splicing kabel feeder dan distribusi',
                    'Melakukan pengukuran redaman dengan OTDR dan OPM',
                    'Membuat dokumentasi hasil pekerjaan',
                ],
                'kualifikasi' => [
                    'Berpengalaman sebagai splicer minimal 1 tahun',
                    'Mampu membaca hasil OTDR',
                    'Bersedia ditempatkan di area proyek',
                ],
            ],
            [
                'judul'      => 'Staff Admin Gudang',
                'slug'       => 'staff-admin-gudang',
                'departemen' => 'Operasional',
                'lokasi'     => 'Banyuwangi',
                'tipe_kerja' => TipeKerja::Kontrak,
                'icon'       => 'package',
                'ringkasan'  => 'Mengelola stok perangkat dan material jaringan.',
                'deskripsi'  => 'Mengelola keluar masuk barang dan material jaringan di gudang.',
                'tanggung_jawab' => [
                    'Mencatat keluar masuk barang',
                    'Melakukan stock opname berkala',
                ],
                'kualifikasi' => [
                    'Minimal SMA/SMK sederajat',
                    'Teliti dan rapi',
                ],
                'status' => StatusLowongan::Draft,
            ],

            // ===== BUSINESS & MARKETING =====
            [
                'judul'      => 'Sales Marketing',
                'slug'       => 'sales-marketing',
                'departemen' => 'Business',
                'lokasi'     => 'Jember',
                'tipe_kerja' => TipeKerja::FullTime,
                'icon'       => 'chart',
                'ringkasan'  => 'Mencari dan mengembangkan pelanggan baru.',
                'deskripsi'  => 'Mengembangkan pasar dan meningkatkan jumlah pelanggan layanan internet CSNET.',
                'tanggung_jawab' => [
                    'Mencari dan menjangkau calon pelanggan baru',
                    'Melakukan presentasi dan penawaran produk',
                    'Mencapai target penjualan bulanan',
                    'Menjaga hubungan baik dengan pelanggan',
                ],
                'kualifikasi' => [
                    'Minimal SMA/SMK sederajat',
                    'Berpengalaman di bidang sales menjadi nilai tambah',
                    'Komunikatif dan berorientasi target',
                    'Memiliki SIM C dan kendaraan pribadi',
                ],
            ],
            [
                'judul'      => 'Account Manager Korporat',
                'slug'       => 'account-manager-korporat',
                'departemen' => 'Business',
                'lokasi'     => 'Surabaya',
                'tipe_kerja' => TipeKerja::FullTime,
                'icon'       => 'briefcase',
                'ringkasan'  => 'Mengelola dan mengembangkan klien bisnis & korporat.',
                'deskripsi'  => 'Bertanggung jawab atas hubungan dengan pelanggan bisnis dan pengembangan layanan dedicated internet.',
                'tanggung_jawab' => [
                    'Mengelola portofolio pelanggan korporat',
                    'Menyusun proposal dan penawaran layanan bisnis',
                    'Melakukan negosiasi dan closing kontrak',
                ],
                'kualifikasi' => [
                    'Minimal S1 semua jurusan',
                    'Berpengalaman minimal 2 tahun di B2B sales (diutamakan ISP/telko)',
                    'Memiliki kemampuan presentasi dan negosiasi yang baik',
                ],
            ],
            [
                'judul'      => 'Sales Canvasser',
                'slug'       => 'sales-canvasser',
                'departemen' => 'Business',
                'lokasi'     => 'Bondowoso',
                'tipe_kerja' => TipeKerja::Kontrak,
                'icon'       => 'chart',
                'ringkasan'  => 'Penjualan langsung door to door di area perumahan.',
                'deskripsi'  => 'Memperkenalkan dan menjual layanan internet CSNET secara langsung ke masyarakat.',
                'tanggung_jawab' => [
                    'Melakukan kunjungan door to door ke calon pelanggan',
                    'Membantu proses pendaftaran pelanggan baru',
                    'Melaporkan hasil kunjungan harian',
                ],
                'kualifikasi' => [
                    'Minimal SMA/SMK sederajat',
                    'Berdomisili di Bondowoso',
                    'Memiliki SIM C dan kendaraan pribadi',
                ],
            ],
            [
                'judul'      => 'Digital Marketing Specialist',
                'slug'       => 'digital-marketing-specialist',
                'departemen' => 'Marketing',
                'lokasi'     => 'Banyuwangi',
                'tipe_kerja' => TipeKerja::FullTime,
                'icon'       => 'megaphone',
                'ringkasan'  => 'Mengelola kampanye iklan digital dan media sosial.',
                'deskripsi'  => 'Merencanakan dan menjalankan strategi pemasaran digital untuk meningkatkan brand awareness dan penjualan CSNET.',
                'tanggung_jawab' => [
                    'Mengelola iklan Meta Ads dan Google Ads',
                    'Menganalisis performa kampanye dan membuat laporan',
                    'Menyusun kalender konten media sosial',
                ],
                'kualifikasi' => [
                    'Minimal D3/S1 semua jurusan',
                    'Berpengalaman mengelola iklan digital minimal 1 tahun',
                    'Memahami SEO dan analitik dasar',
                ],
            ],
            [
                'judul'      => 'Content Creator',
                'slug'       => 'content-creator',
                'departemen' => 'Marketing',
                'lokasi'     => 'Banyuwangi',
                'tipe_kerja' => TipeKerja::PartTime,
                'icon'       => 'camera',
                'ringkasan'  => 'Membuat konten foto dan video untuk media sosial.',
                'deskripsi'  => 'Memproduksi konten kreatif yang menarik untuk akun media sosial CSNET.',
                'tanggung_jawab' => [
                    'Membuat konten video pendek (Reels, TikTok)',
                    'Melakukan pemotretan dan editing foto',
                    'Menulis caption yang menarik',
                ],
                'kualifikasi' => [
                    'Mahir menggunakan CapCut, Canva, atau Adobe Premiere',
                    'Kreatif dan mengikuti tren media sosial',
                    'Memiliki portofolio konten',
                ],
            ],

            // ===== CUSTOMER SUPPORT =====
            [
                'judul'      => 'Customer Service',
                'slug'       => 'customer-service',
                'departemen' => 'Customer Support',
                'lokasi'     => 'Banyuwangi',
                'tipe_kerja' => TipeKerja::FullTime,
                'icon'       => 'headset',
                'ringkasan'  => 'Memberikan layanan dan solusi untuk pelanggan CSNET.',
                'deskripsi'  => 'Menjadi garda depan pelayanan pelanggan CSNET melalui telepon, chat, dan tatap muka.',
                'tanggung_jawab' => [
                    'Menangani pertanyaan dan keluhan pelanggan',
                    'Mencatat dan meneruskan laporan gangguan ke tim teknis',
                    'Memproses pendaftaran dan administrasi pelanggan',
                ],
                'kualifikasi' => [
                    'Minimal D3 semua jurusan',
                    'Ramah, sabar, dan komunikatif',
                    'Menguasai Microsoft Office',
                    'Bersedia bekerja dengan sistem shift',
                ],
            ],
            [
                'judul'      => 'Customer Service - Jember',
                'slug'       => 'customer-service-jember',
                'departemen' => 'Customer Support',
                'lokasi'     => 'Jember',
                'tipe_kerja' => TipeKerja::PartTime,
                'icon'       => 'headset',
                'ringkasan'  => 'Melayani pelanggan di kantor cabang Jember.',
                'deskripsi'  => 'Memberikan pelayanan tatap muka dan administrasi pelanggan di kantor cabang Jember.',
                'tanggung_jawab' => [
                    'Melayani pelanggan yang datang ke kantor cabang',
                    'Memproses pembayaran dan administrasi',
                    'Meneruskan keluhan ke tim terkait',
                ],
                'kualifikasi' => [
                    'Minimal SMA/SMK sederajat',
                    'Berpenampilan rapi dan komunikatif',
                    'Berdomisili di Jember',
                ],
            ],

            // ===== FINANCE & HR =====
            [
                'judul'      => 'Staff Finance & Billing',
                'slug'       => 'staff-finance-billing',
                'departemen' => 'Finance',
                'lokasi'     => 'Banyuwangi',
                'tipe_kerja' => TipeKerja::FullTime,
                'icon'       => 'wallet',
                'ringkasan'  => 'Mengelola tagihan pelanggan dan pencatatan keuangan.',
                'deskripsi'  => 'Bertanggung jawab atas proses penagihan, rekonsiliasi pembayaran, dan laporan keuangan harian.',
                'tanggung_jawab' => [
                    'Memproses tagihan bulanan pelanggan',
                    'Melakukan rekonsiliasi pembayaran',
                    'Menyusun laporan keuangan harian dan bulanan',
                ],
                'kualifikasi' => [
                    'Minimal D3 Akuntansi / Keuangan',
                    'Menguasai Microsoft Excel',
                    'Teliti dan jujur',
                ],
            ],
            [
                'judul'      => 'Kolektor Tagihan',
                'slug'       => 'kolektor-tagihan',
                'departemen' => 'Finance',
                'lokasi'     => 'Lumajang',
                'tipe_kerja' => TipeKerja::Kontrak,
                'icon'       => 'wallet',
                'ringkasan'  => 'Melakukan penagihan langsung ke pelanggan.',
                'deskripsi'  => 'Mengunjungi pelanggan untuk penagihan tunggakan pembayaran layanan.',
                'tanggung_jawab' => [
                    'Melakukan kunjungan penagihan ke pelanggan',
                    'Menyetorkan hasil penagihan ke bagian keuangan',
                ],
                'kualifikasi' => [
                    'Minimal SMA/SMK sederajat',
                    'Memiliki SIM C dan kendaraan pribadi',
                ],
                'status' => StatusLowongan::Draft,
            ],
            [
                'judul'      => 'Staff HRD',
                'slug'       => 'staff-hrd',
                'departemen' => 'Human Resources',
                'lokasi'     => 'Banyuwangi',
                'tipe_kerja' => TipeKerja::FullTime,
                'icon'       => 'users',
                'ringkasan'  => 'Mengelola rekrutmen dan administrasi karyawan.',
                'deskripsi'  => 'Mendukung proses rekrutmen, administrasi kepegawaian, dan pengembangan karyawan.',
                'tanggung_jawab' => [
                    'Melakukan proses rekrutmen dan seleksi',
                    'Mengelola data dan administrasi karyawan',
                    'Menyusun program pelatihan internal',
                ],
                'kualifikasi' => [
                    'Minimal S1 Psikologi / Manajemen SDM',
                    'Memahami UU Ketenagakerjaan',
                    'Berpengalaman minimal 1 tahun di bidang HR',
                ],
                'status' => StatusLowongan::Ditutup,
            ],
        ];

        foreach ($data as $item) {
            $status = $item['status'] ?? StatusLowongan::Aktif;

            [$publishedAt, $ditutupAt] = match ($status) {
                StatusLowongan::Aktif   => [now()->subDays(rand(1, 30)), now()->addDays(rand(14, 60))->toDateString()],
                StatusLowongan::Ditutup => [now()->subMonths(2), now()->subDays(7)->toDateString()],
                default                 => [null, null],
            };

            Lowongan::updateOrCreate(
                ['slug' => $item['slug']],
                array_merge($item, [
                    'benefit'      => $benefitUmum,
                    'status'       => $status,
                    'published_at' => $publishedAt,
                    'ditutup_at'   => $ditutupAt,
                ])
            );
        }
    }
}