<?php

use App\Models\PurchaseOrder;
use Illuminate\Database\Seeder;

class PurchaseOrders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PurchaseOrder::class, config('memfis.dummies.purchase-orders'))->create();
    }
}
