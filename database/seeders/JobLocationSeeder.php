<?php

namespace Database\Seeders;

use App\Models\JobLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobLocation::insert([
            ['name' => 'Banyuwangi'],
            ['name' => 'Jember']
        ]);
    }
}
