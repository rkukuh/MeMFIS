<?php

namespace App\Models\Pivots;

use App\Models\Promo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PurchaseOrderItem extends Pivot
{
    use SoftDeletes;

    protected $table = 'item_purchase_order';

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * M-M Polymorphic: A promo can be applied to many entities.
     *
     * This function will get all the promos that are applied to a given PO's Item.
     * See: Promo's purchase_order_items() method for the inverse
     *
     * @return mixed
     */
    public function promos()
    {
        return $this->morphToMany(Promo::class, 'promoable')
                        ->withPivot(
                            'value', 
                            'amount'
                        )
                        ->withTimestamps();
    }
}
