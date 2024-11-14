<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create role 
        $developer = Role::create(['name' => 'Developer']);
        $administrator = Role::create(['name' => 'Administrator']);
        $noc = Role::create(['name' => 'Noc']);
        $supportnoc = Role::create(['name' => 'Support Noc']);
        $odp = Role::create(['name' => 'Team Odp']);
        $project = Role::create(['name' => 'Project']);
        $marketingretail = Role::create(['name' => 'Marketing Retail']);
        $marketingbisnis = Role::create(['name' => 'Marketing Bisnis RT RW']);
        $datacenter = Role::create(['name' => 'Data Center']);
        $admin = Role::create(['name' => 'Admin']);

        //give permission role
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
            'delete-spk',
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
    }
}
