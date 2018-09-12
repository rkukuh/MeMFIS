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
        /** MASTER */

        $this->call(Banks::class);

        /** FINANCE */

        $this->call(BankAccounts::class);
    }
}
