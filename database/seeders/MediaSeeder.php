<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Media::create([
            'name'=>'Testing Pdf',
            'type'=>'pdf',
            'pdf'=>'https://raw.githubusercontent.com/mozilla/pdf.js/ba2edeae/web/compressed.tracemonkey-pldi-09.pdf',
            'usertype'=>'Administrator',
            'slug'=> 'testing-pdf'
        ]);
        Media::create([
            'name'=>'Coba Vidio',
            'type'=>'vidio',
            'url'=>'https://files.csnet.id/index.php/s/YitcmwcBEzozXNS/download/D21%20FUN%20Elemental%202023%201693117920%20mp4.mp4',
            'usertype'=>'Administrator',
            'slug'=> 'coba-vidio'
        ]);
    }
}
