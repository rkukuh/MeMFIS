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

        /** INITIAL DATA */

        $this->call(TypesTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(CategoriesOfItem::class);
        $this->call(StatusesTableSeeder::class);

        /** POLYMORPH */

        $this->call(FaxesTableSeeder::class);
        $this->call(NotesTableSeeder::class);
        $this->call(EmailsTableSeeder::class);
        $this->call(PhonesTableSeeder::class);
        $this->call(AddressesTableSeeder::class);

        /** MASTER */

        $this->call(ItemsTableSeeder::class);
        $this->call(StoragesTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(ManufacturersTableSeeder::class);
        $this->call(AircraftsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(LicensesTableSeeder::class);

        /** EDUCATION */

        $this->call(EmployeeLicensesTableSeeder::class);
        $this->call(GeneralLicensesTableSeeder::class);
        $this->call(AmeLicensesTableSeeder::class);

        /** FINANCE */

        $this->call(BanksTableSeeder::class);
        $this->call(BankAccountsTableSeeder::class);
    }
}
