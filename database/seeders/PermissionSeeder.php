<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrayOfPermissionNames = [
            'read-dashboard',
            'read-partner',
            'create-partner',
            'update-partner',
            'delete-partner',
            'read-media',
            'create-media',
            'update-media',
            'delete-media',
            'read-faq',
            'create-faq',
            'update-faq',
            'delete-faq',
            'read-tremofservice',
            'update-tremofservice',
            'delete-tremofservice',
            'read-privacyppolicy',
            'update-privacyppolicy',
            'delete-privacyppolicy',
            'read-paket',
            'create-paket',
            'update-paket',
            'delete-paket',
            'read-categoripaket',
            'create-categoripaket',
            'update-categoripaket',
            'delete-categoripaket',
            'read-deskripsi',
            'create-deskripsi',
            'update-deskripsi',
            'delete-deskripsi',
            'read-promo',
            'create-promo',
            'update-promo',
            'delete-promo',
            'read-promopaket',
            'create-promopaket',
            'update-promopaket',
            'delete-promopaket',
            'read-kota',
            'create-kota',
            'update-kota',
            'delete-kota',
            'read-kecamatan',
            'create-kecamatan',
            'update-kecamatan',
            'delete-kecamatan',
            'read-kelurahan',
            'create-kelurahan',
            'update-kelurahan',
            'delete-kelurahan',
            'read-jalan',
            'create-jalan',
            'update-jalan',
            'delete-jalan',
            'read-area',
            'create-area',
            'update-area',
            'delete-area',
            'read-odp',
            'create-odp',
            'update-odp',
            'delete-odp',
            'read-categoryjob',
            'create-categoryjob',
            'update-categoryjob',
            'delete-categoryjob',
            'read-locationjob',
            'create-locationjob',
            'update-locationjob',
            'delete-locationjob',
            'read-hiring',
            'create-hiring',
            'update-hiring',
            'delete-hiring',
            'read-maps',
            'read-users',
            'create-users',
            'update-users',
            'delete-users',
            'read-role',
            'create-role',
            'update-role',
            'delete-role',
            'read-spk',
            'create-spk',
            'delete-spk',
        ];
        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });
        Permission::insert($permissions->toArray());
    }
}
