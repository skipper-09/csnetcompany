<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::insert([
            [
                'question'=> 'Apa itu CSNET?',
            'answer'=> 'CSNET adalah Internet Service Provider yang berpusat di Banyuwangi dan memiliki kantor layanan pelanggan di JL Sumbersari – Jember'
            ],
            [
            'question'=> 'Kenapa harus pakai CSNET? ',
            'answer'=> 'CSNET merupakan ISP yang menyediakan kapasitas bandwidth yang besar untuk koneksi  internet cepat anda, dengan pilihan kapasitas mulaidari up to 10 Mbps untuk kebutuhan arus informasi anda. Browsing , Streaming, Game Online, Upload Dan Download semakin lancer dengan CSNET.'
            ],
            [
            'question'=> 'Apa saja layanan yang disediakan oleh CSNET?',
            'answer'=> 'CSNET memberikan layanan penyediaan koneksi internet.'
            ],
        ],
    );
    }
}
