<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesOfRIR extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'code' => 'purchase',
            'name' => 'Purchase',
            'of'   => 'rir',
        ]);

        Status::create([
            'code' => 'repair',
            'name' => 'Repair',
            'of'   => 'rir',
        ]);

        Status::create([
            'code' => 'serviceable',
            'name' => 'Serviceable',
            'of'   => 'rir',
        ]);

        Status::create([
            'code' => 'unserviceable',
            'name' => 'Unserviceable',
            'of'   => 'rir',
        ]);
    }
}
