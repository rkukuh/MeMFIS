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
        $this->call(StatusesOfEmployment::class);
        $this->call(StatusesOfMarital::class);
    }
}
