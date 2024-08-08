<?php

namespace Database\Seeders;

use App\Models\CategoryPacket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriPacketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryPacket::insert([
            [
                'name' => 'Broadbad'
            ],
            [
                'name' => 'Internet + TV'
            ],
            [
                'name' => 'Promo'
            ],
        ]);
    }
}
