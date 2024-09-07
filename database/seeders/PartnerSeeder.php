<?php

namespace Database\Seeders;

use App\Models\partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i <= 1; $i++) {
            partner::insert([
                'name' => $faker->name,
                'logo' => $faker->imageUrl
            ]);
        }
    }
}
