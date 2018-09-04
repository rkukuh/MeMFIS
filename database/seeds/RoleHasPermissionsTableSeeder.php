<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleHasPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ADMIN role permissions:

        $admin = Role::where('name', 'admin')->first();

        $admin->givePermissionTo('user-create');
        $admin->givePermissionTo('user-edit');
        $admin->givePermissionTo('user-remove');
        $admin->givePermissionTo('user-delete');
    }
}
