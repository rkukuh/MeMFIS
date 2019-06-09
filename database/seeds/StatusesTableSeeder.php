<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatusesOfCustomerComponentRepair::class);
        $this->call(StatusesOfDefectCard::class);
        $this->call(StatusesOfEmployment::class);
        $this->call(StatusesOfJobCard::class);
        $this->call(StatusesOfMarital::class);
        $this->call(StatusesOfQuotation::class);
    }
}
