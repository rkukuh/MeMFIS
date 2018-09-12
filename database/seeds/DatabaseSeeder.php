<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /** USER and ACL/RBAC */

        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        /** INDEPENDENT / POLYMORPH */

        $this->call(PhonesTableSeeder::class);

        /** FINANCE */

        $this->call(BanksTableSeeder::class);
        $this->call(BankAccountsTableSeeder::class);
    }
}
