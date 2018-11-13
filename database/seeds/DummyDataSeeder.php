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

        /** INITIAL DATA */

        $this->call(Types::class);
        $this->call(Units::class);
        $this->call(Levels::class);
        $this->call(Statuses::class);
        $this->call(Currencies::class);
        $this->call(Journals::class);

        /** POLYMORPH */

        $this->call(Faxes::class);
        $this->call(Notes::class);
        $this->call(Emails::class);
        $this->call(Phones::class);
        $this->call(Addresses::class);
        $this->call(Versions::class);
        $this->call(Documents::class);

        /** MASTER */

        $this->call(Items::class);
        $this->call(Storages::class);
        $this->call(Departments::class);
        $this->call(Manufacturers::class);
        $this->call(Aircrafts::class);
        $this->call(Employees::class);
        $this->call(Licenses::class);
        $this->call(Certifications::class);
        $this->call(Customers::class);

        /** LICENSE */

        $this->call(EmployeeLicenses::class);
        $this->call(GeneralLicenses::class);
        $this->call(Amels::class);

        /** CERTIFICATION */

        $this->call(CertificationEmployees::class);
        $this->call(OTRCertifications::class);

        /** FINANCE */

        $this->call(Banks::class);
        $this->call(BankAccounts::class);

        /** TRANSACTION (M-M) */

        $this->call(ItemUnit::class);
        $this->call(ItemStorage::class);
        $this->call(TaskCardsTableSeeder::class);
    }
}
