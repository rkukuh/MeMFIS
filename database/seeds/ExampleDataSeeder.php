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
        /** POLYMORPH */

        $this->call(Types::class);
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
