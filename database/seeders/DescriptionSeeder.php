<?php

namespace Database\Seeders;

use App\Models\Description;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Description::insert([
            'name'=>'Gratis Biaya Pasang',
            'packet_id'=>1,
            'logo' => 'https://letsenhance.io/static/8f5e523ee6b2479e26ecc91b9c25261e/1015f/MainAfter.jpg',
        ]);
    }
}
