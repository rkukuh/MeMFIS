<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesOfCustomerComponentRepair extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'name' => 'Serviceable',
            'of'   => 'customer-component-repair',
        ]);

        Status::create([
            'name' => 'Unserviceable',
            'of'   => 'customer-component-repair',
        ]);
    }
}
