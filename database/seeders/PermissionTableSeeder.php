<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'kategori-list',
            'kategori-create',
            'kategori-edit',
            'kategori-delete',
            'pertanyaan-list',
            'pertanyaan-create',
            'pertanyaan-edit',
            'pertanyaan-delete',
            'sekolah-list',
            'sekolah-create',
            'sekolah-edit',
            'sekolah-delete',
            'departement-list',
            'departement-create',
            'departement-edit',
            'departement-delete',
            'config-list',
            'config-create',
            'config-edit',
            'config-delete',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
