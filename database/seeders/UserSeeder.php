<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Developer
        $developer = User::updateOrCreate(
            ['email' => 'root@gmail.com'], 
            [
                'name' => 'Developer',
                'username' => 'root',
                'password' => Hash::make('root'),
            ]
        );
        $developer->assignRole('Developer');

        // 2. Administrator
        $administrator = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => Hash::make('admin'),
            ]
        );
        $administrator->assignRole('Administrator');

        // 3. Supplier
        $supplier = User::updateOrCreate(
            ['email' => 'supplier@gmail.com'],
            [
                'name' => 'Supplier',
                'username' => 'supplier',
                'password' => Hash::make('supplier'),
            ]
        );
        $supplier->assignRole('Supplier');

        // 4. Vendor
        $vendor = User::updateOrCreate(
            ['email' => 'vendor@gmail.com'],
            [
                'name' => 'Vendor',
                'username' => 'vendor',
                'password' => Hash::make('vendor'),
            ]
        );
        $vendor->assignRole('Vendor');
    }
}