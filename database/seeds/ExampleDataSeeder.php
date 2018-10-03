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
        /** INITIAL DATA */

        $this->call(Types::class);
        $this->call(Statuses::class);

        /** POLYMORPH */

        $this->call(Faxes::class);
        $this->call(Emails::class);
        $this->call(Phones::class);

        /** MASTER */

        $this->call(Departments::class);

        /** FINANCE */

        $this->call(Banks::class);
        $this->call(BankAccounts::class);
    }
}
