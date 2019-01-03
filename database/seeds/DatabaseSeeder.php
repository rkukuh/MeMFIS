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

        $this->call(TagsTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(JournalsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);

        /** MASTER */

        $this->call(ManufacturersTableSeeder::class);
        $this->call(AircraftsTableSeeder::class);
        $this->call(AircraftZonesTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(SchoolsTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(StoragesTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(LicensesTableSeeder::class);
        $this->call(CertificationsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);

        /** POLYMORPH */

        $this->call(FaxesTableSeeder::class);
        $this->call(PhonesTableSeeder::class);
        $this->call(EmailsTableSeeder::class);
        $this->call(AccessesTableSeeder::class);
        $this->call(WebsitesTableSeeder::class);
        $this->call(VersionsTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(DocumentsTableSeeder::class);
        $this->call(MaintenanceCyclesTableSeeder::class);

        /** LICENSE */

        $this->call(EmployeeLicenseTableSeeder::class);
        $this->call(GeneralLicensesTableSeeder::class);
        $this->call(AmelsTableSeeder::class);

        /** CERTIFICATION */

        $this->call(CertificationEmployeeTableSeeder::class);
        $this->call(OTRCertificationsTableSeeder::class);

        /** TRANSACTION (M-M) */

        $this->call(TaskCardsTableSeeder::class);
        $this->call(QuotationsTableSeeder::class);
        $this->call(WorkPackagesTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
    }
}
