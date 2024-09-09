<?php

namespace Database\Seeders;

use App\Models\Hiring;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HiringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hiring::create([
            'name' => 'IT Programmer',
            'qualification' => 'testing',
            'category_job' => 1,
            'job_location' => 1,
            'slug' => 'it-programmer',
        ]);
    }
}
