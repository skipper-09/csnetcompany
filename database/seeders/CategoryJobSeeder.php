<?php

namespace Database\Seeders;

use App\Models\CategoryJob;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryJob::insert([
            ['name' => 'Marketing'],
            ['name' => 'Noc'],
            ['name' => 'Customer Service'],
        ]);
    }
}
