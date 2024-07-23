<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i <=50 ; $i++) { 
            Area::insert([
                'name'=>$faker->address,
                'kode_pos'=>$faker->numberBetween(1000,6000),
            ]);
        }
    }
}
