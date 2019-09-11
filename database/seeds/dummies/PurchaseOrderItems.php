<?php

use App\Models\Promo;
use Illuminate\Database\Seeder;
use App\Models\Pivots\PurchaseOrderItem;

class PurchaseOrderItems extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= (PurchaseOrderItem::count() / 10); $i++) {
            $purchase_order = PurchaseOrderItem::find($i);

            for ($j = 1; $j <= rand(1, 3); $j++) {
                $purchase_order->promos()->save(Promo::get()->random(), [
                    'value'     => rand(1, 9) * 10,
                    'amount'    => rand(100, 200) * 1000000,
                ]);
            }
        }
    }
}
