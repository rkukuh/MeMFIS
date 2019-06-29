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
        $this->call(LanguagesTableSeeder::class);
        $this->call(SchoolsTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(StoragesTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(LicensesTableSeeder::class);
        $this->call(CertificationsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(VendorsTableSeeder::class);
        $this->call(FacilitiesTableSeeder::class);

        /** POLYMORPH */

        $this->call(FaxesTableSeeder::class);
        $this->call(ZonesTableSeeder::class);
        $this->call(PhonesTableSeeder::class);
        $this->call(EmailsTableSeeder::class);
        $this->call(PricesTableSeeder::class);
        $this->call(RepeatsTableSeeder::class);
        $this->call(AccessesTableSeeder::class);
        $this->call(WebsitesTableSeeder::class);
        $this->call(VersionsTableSeeder::class);
        $this->call(StationsTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(DocumentsTableSeeder::class);
        $this->call(ThresholdsTableSeeder::class);
        $this->call(ApprovalsTableSeeder::class);
        $this->call(ProgressesTableSeeder::class);
        $this->call(InspectionsTableSeeder::class);

        /** LICENSE */

        $this->call(EmployeeLicenseTableSeeder::class);
        $this->call(GeneralLicensesTableSeeder::class);
        $this->call(AmelsTableSeeder::class);

        /** CERTIFICATION */

        $this->call(CertificationEmployeeTableSeeder::class);
        $this->call(OTRCertificationsTableSeeder::class);

        /** TRANSACTION (M-M) */

        $this->call(TaskCardsTableSeeder::class);
        $this->call(EOInstructionsTableSeeder::class);
        $this->call(QuotationsTableSeeder::class);
        $this->call(WorkPackagesTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(JobCardsTableSeeder::class);
        $this->call(PurchaseRequestsTableSeeder::class);
        $this->call(PurchaseOrdersTableSeeder::class);
        $this->call(GoodsReceivedTableSeeder::class);
        $this->call(HtCrrsTableSeeder::class);
        $this->call(DefectCardsTableSeeder::class);
        $this->call(RTSTableSeeder::class);
        
        /** PROJECT'S WORKPACKAGES */

        $this->call(ProjectWorkPackagesTableSeeder::class);
        $this->call(ProjectWorkPackageEngineersTableSeeder::class);
        $this->call(ProjectWorkPackageManhoursTableSeeder::class);
        $this->call(ProjectWorkPackageFacilitiesTableSeeder::class);

        /** WORKPACKAGE's TASKCARDS */

        $this->call(TaskCardWorkPackagesTableSeeder::class);
        $this->call(TaskCardWorkPackagePredecessorsTableSeeder::class);
        $this->call(TaskCardWorkPackageSuccessorsTableSeeder::class);
    }
}
