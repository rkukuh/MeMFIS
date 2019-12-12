<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesOfPurchaseRequest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'code' => 'open',
            'name' => 'Open',
            'of'   => 'purchase-request',
        ]);

        Status::create([
            'code' => 'approved',
            'name' => 'Approved',
            'of'   => 'purchase-request',
        ]);

        Status::create([
            'code' => 'closed',
            'name' => 'Closed',
            'of'   => 'purchase-request',
        ]);
    }
}
