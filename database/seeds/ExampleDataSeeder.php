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
        /** INDEPENDENT / POLYMORPH */

        $this->call(Faxes::class);
        $this->call(Types::class);
        $this->call(Phones::class);


        /** FINANCE */

        $this->call(Banks::class);
        $this->call(BankAccounts::class);
    }
}
