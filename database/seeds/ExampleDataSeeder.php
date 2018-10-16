<?php

use Illuminate\Database\Seeder;

class ExampleDataSeeder extends Seeder
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
        $this->call(Statuses::class);

        /** POLYMORPH */

        $this->call(Faxes::class);
        $this->call(Notes::class);
        $this->call(Emails::class);
        $this->call(Phones::class);
        $this->call(Addresses::class);

        /** MASTER */

        $this->call(Items::class);
        $this->call(Storages::class);
        $this->call(Departments::class);
        $this->call(Manufacturers::class);
        $this->call(Aircrafts::class);
        $this->call(Employees::class);
        $this->call(Licenses::class);

        /** EDUCATION */

        $this->call(EmployeeLicenses::class);
        $this->call(GeneralLicenses::class);
        $this->call(AmeLicenses::class);

        /** FINANCE */

        $this->call(Banks::class);
        $this->call(BankAccounts::class);

        /** TRANSACTION (M-M) */

        $this->call(ItemUnit::class);
        $this->call(ItemStorage::class);
    }
}
