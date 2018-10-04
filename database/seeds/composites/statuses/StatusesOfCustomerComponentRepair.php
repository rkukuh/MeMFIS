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
            'code' => 'serviceable',
            'name' => 'SERVICEABLE',
            'of'   => 'customer-component-repair',
        ]);

        Status::create([
            'code' => 'unserviceable',
            'name' => 'UNSERVICABLE',
            'of'   => 'customer-component-repair',
        ]);
    }
}
