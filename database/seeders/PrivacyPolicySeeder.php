<?php

namespace Database\Seeders;

use App\Models\PrivacyPolicy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrivacyPolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PrivacyPolicy::insert([
            'privacy'=>'<p>Terima kasih Anda telah berlangganan Layanan Telekomunikasi Idnet. Jika Anda berlangganan Layanan Telekomunikasi Idnet, Anda harus menyetujui Kebijakan Privasi ini.</p>'
        ]);
    }
}
