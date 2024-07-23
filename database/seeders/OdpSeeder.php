<?php

namespace Database\Seeders;

use App\Models\Odp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OdpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i <=10 ; $i++) { 
            Odp::insert([
                'name'=>$faker->company,
                'area_id'=>$faker->numberBetween(1,20),
                'splitter'=>'16',
                'port'=>16,
                'latitude'=>$faker->latitude,
                'longitude'=>$faker->longitude,
            ]);
        }
    }
}
