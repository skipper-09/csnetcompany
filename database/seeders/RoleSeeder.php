<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Menggunakan firstOrCreate agar aman jika dijalankan berulang kali
        $developer       = Role::firstOrCreate(['name' => 'Developer']);
        $administrator   = Role::firstOrCreate(['name' => 'Administrator']);
        $noc             = Role::firstOrCreate(['name' => 'Noc']);
        $supportnoc      = Role::firstOrCreate(['name' => 'Support Noc']);
        $odp             = Role::firstOrCreate(['name' => 'Team Odp']);
        $project         = Role::firstOrCreate(['name' => 'Project']);
        $marketingretail = Role::firstOrCreate(['name' => 'Marketing Retail']);
        $marketingbisnis = Role::firstOrCreate(['name' => 'Marketing Bisnis RT RW']);
        $datacenter      = Role::firstOrCreate(['name' => 'Data Center']);
        $admin           = Role::firstOrCreate(['name' => 'Admin']);
        $supplier        = Role::firstOrCreate(['name' => 'Supplier']);
        $vendor          = Role::firstOrCreate(['name' => 'Vendor']);

        // give permission role
        $developer->givePermissionTo([
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
            'update-spk',
            'delete-spk',
            
            'read-vendorsupplier',

            'read-vendor',
            'create-vendor',
            'update-vendor',
            'delete-vendor',

            'read-supplier',
            'create-supplier',
            'update-supplier',
            'delete-supplier',

            'read-lowongan',
            'create-lowongan',
            'update-lowongan',
            'delete-lowongan',

            'read-lamaran',
            'create-lamaran',
            'update-lamaran',
            'delete-lamaran',
        ]);

        $administrator->givePermissionTo([
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

            'read-vendorsupplier',

            'read-vendor',
            'create-vendor',
            'update-vendor',
            'delete-vendor',

            'read-supplier',
            'create-supplier',
            'update-supplier',
            'delete-supplier',

            'read-lowongan',
            'create-lowongan',
            'update-lowongan',
            'delete-lowongan',

            'read-lamaran',
            'create-lamaran',
            'update-lamaran',
            'delete-lamaran',
        ]);

        $noc->givePermissionTo([
            'read-media'
        ]);
        $supportnoc->givePermissionTo([
            'read-media'
        ]);
        $datacenter->givePermissionTo([
            'read-media'
        ]);
        $odp->givePermissionTo([
            'read-media'
        ]);
        $project->givePermissionTo([
            'read-media'
        ]);
        $marketingretail->givePermissionTo([
            'read-media'
        ]);
        $marketingbisnis->givePermissionTo([
            'read-media'
        ]);
        $admin->givePermissionTo([
            'read-media'
        ]);
        $supplier->givePermissionTo([
            'read-dashboard',
            'read-supplier',
            'create-supplier',
            'update-supplier',
            'delete-supplier',
        ]);
        $vendor->givePermissionTo([
            'read-dashboard',
            'read-vendor',
            'create-vendor',
            'update-vendor',
            'delete-vendor',
        ]);
    }
}