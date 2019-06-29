<?php

use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ini_set('memory_limit', '-1');

        /** USER and ACL/RBAC */

        $this->call(Users::class);

        /** INITIAL DATA */

        $this->call(Types::class);
        $this->call(Units::class);
        $this->call(Levels::class);
        $this->call(Statuses::class);
        $this->call(Journals::class);
        $this->call(Categories::class);
        $this->call(Currencies::class);

        /** MASTER */

        $this->call(Manufacturers::class);
        $this->call(Aircrafts::class);
        $this->call(Languages::class);
        $this->call(Schools::class);
        $this->call(Departments::class);
        $this->call(Employees::class);
        $this->call(Storages::class);
        $this->call(Items::class);
        $this->call(Licenses::class);
        $this->call(Certifications::class);
        $this->call(Customers::class);
        $this->call(Vendors::class);
        $this->call(Facilities::class);

        /** POLYMORPH */

        $this->call(Faxes::class);
        $this->call(Zones::class);
        $this->call(Emails::class);
        $this->call(Phones::class);
        $this->call(Prices::class);
        $this->call(Repeats::class);
        $this->call(Websites::class);
        $this->call(Versions::class);
        $this->call(Accesses::class);
        $this->call(Stations::class);
        $this->call(Addresses::class);
        $this->call(Documents::class);
        $this->call(Thresholds::class);
        $this->call(Approvals::class);
        $this->call(Progresses::class);
        $this->call(Inspections::class);

        /** LICENSE */

        $this->call(EmployeeLicenses::class);
        $this->call(GeneralLicenses::class);
        $this->call(Amels::class);

        /** CERTIFICATION */

        $this->call(CertificationEmployees::class);
        $this->call(OTRCertifications::class);

        /** TRANSACTION (M-M) */

        $this->call(ItemUnits::class);
        $this->call(ItemStorages::class);
        $this->call(TaskCards::class);
        $this->call(EOInstructions::class);
        $this->call(Projects::class);
        $this->call(Quotations::class);
        $this->call(JobCards::class);
        $this->call(WorkPackages::class);
        $this->call(PurchaseRequests::class);
        $this->call(PurchaseOrders::class);
        $this->call(GoodsReceiveds::class);
        $this->call(HtCrrs::class);
        $this->call(DefectCards::class);
        $this->call(RTSs::class);
        
        /** PROJECT'S WORKPACKAGES */

        $this->call(ProjectWorkPackages::class);
        $this->call(ProjectWorkPackageEngineers::class);
        $this->call(ProjectWorkPackageManhours::class);
        $this->call(ProjectWorkPackageFacilities::class);

        /** WORKPACKAGE's TASKCARDS */

        $this->call(TaskCardWorkPackages::class);
    }
}
