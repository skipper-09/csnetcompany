<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Developer',
            'email' => 'root@gmail.com',
            'username' => 'root',
            'password' => Hash::make('root'),
        ])->assignRole('Developer');

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'is_block' => 1,
            'password' => Hash::make('admin'),
        ])->assignRole('Administrator');
    }
}
