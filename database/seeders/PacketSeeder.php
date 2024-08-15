<?php

namespace Database\Seeders;

use App\Models\packet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        packet::insert([
            'name' => 'Speed Bootster',
            'speed' => 10,
            'category_id' => 1,
            'price' => 100000,
            'duration' => 'Bulan',
        ]);
    }
}
