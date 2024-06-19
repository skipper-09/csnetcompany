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
            'name'=>'10 MBPS',
            'category_id'=>1,
            'price' => 100000,
            'duration' => 'Bulan',
            'description'=>'test'
        ]);
    }
}
