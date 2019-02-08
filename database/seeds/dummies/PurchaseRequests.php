<?php

use App\Models\PurchaseRequest;
use Illuminate\Database\Seeder;

class PurchaseRequests extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PurchaseRequest::class, config('memfis.dummies.purchase-requests'))->create();
    }
}
