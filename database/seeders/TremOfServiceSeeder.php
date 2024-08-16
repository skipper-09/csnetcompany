<?php

namespace Database\Seeders;

use App\Models\TremofService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TremOfServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TremofService::insert([
            'tremofservice'=>'<h3><strong>DEFINISI&nbsp;</strong></h3><ol><li>1. adalah PT. Internusa Duta Makmur yang dalam hal ini bertindak sebagai penyedia Layanan Internet Unlimited yang terjangkau untuk semua orang.</li><li>2. PELANGGAN adalah perorangan, badan usaha atau badan hukum yang berkedudukan di Indonesia yang telah menandatangani Kontrak Berlangganan dengan IDNET untuk berlangganan Layanan Internet dan bertanggung jawab atas segala akibat yang timbul daripadanya.&nbsp;</li><li>3. Kontrak Berlangganan adalah kontrak berlangganan Layanan INTERNET IDNET antara IDNET dan PELANGGAN yang berisi data PELANGGAN, data Layanan Paket intenet yang dipilih oleh PELANGGAN, Ketentuan Tambahan, Syarat dan Ketentuan serta kebijakan privasi IDNET yang berlaku, dan pernyataan atau kesepakatan lainnya antara IDNET dan PELANGGAN, termasuk penambahan dan perubahannya dari waktu ke waktu&nbsp;</li></ol>'
        ]);
    }
}
