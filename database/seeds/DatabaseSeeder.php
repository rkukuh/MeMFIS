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

        /** POLYMORPH */

        $this->call(FaxesTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(EmailsTableSeeder::class);
        $this->call(PhonesTableSeeder::class);

        /** MASTER */

        $this->call(DepartmentsTableSeeder::class);

        /** FINANCE */

        $this->call(BanksTableSeeder::class);
        $this->call(BankAccountsTableSeeder::class);
    }
}
