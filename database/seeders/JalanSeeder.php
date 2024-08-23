<?php

namespace Database\Seeders;

use App\Models\Jalan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JalanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jalan::insert([
            'name' => 'Perum Patrang',
            'kelurahan_id' => 1
        ]);
    }
}
