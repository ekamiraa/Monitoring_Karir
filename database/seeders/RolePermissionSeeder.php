<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $importFilePermission = Permission::create(['name' => 'import-file']);

        $roleAdmin = Role::create(['name' => 'admin']);

        $roleAdmin->givePermissionTo($importFilePermission);
    }
}
