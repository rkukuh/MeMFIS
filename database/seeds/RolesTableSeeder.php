<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'employee']);
        Role::create(['name' => 'customer']);

        Role::create(['name' => 'hrd']);
        Role::create(['name' => 'marketing']);
        Role::create(['name' => 'ppic']);
        Role::create(['name' => 'finance']);
        Role::create(['name' => 'scm']);
        Role::create(['name' => 'engineer']);
        Role::create(['name' => 'helper']);

        Role::create(['name' => 'dummy']);
    }
}
