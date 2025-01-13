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
            'privacy'=>'<p>Terima kasih Anda telah berlangganan Layanan Telekomunikasi CSNET. Jika Anda berlangganan Layanan Telekomunikasi CSNET, Anda harus menyetujui Kebijakan Privasi ini.</p>'
        ]);
    }
}
