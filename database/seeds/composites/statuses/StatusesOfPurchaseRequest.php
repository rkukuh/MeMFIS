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
            'name' => 'OPEN',
            'of'   => 'purchase-request',
        ]);

        Status::create([
            'code' => 'approve',
            'name' => 'Approve',
            'of'   => 'purchase-request',
        ]);

        Status::create([
            'code' => 'closed',
            'name' => 'CLOSED',
            'of'   => 'purchase-request',
        ]);
    }
}
