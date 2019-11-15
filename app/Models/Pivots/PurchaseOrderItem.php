<?php

namespace App\Models\Pivots;

use App\Models\Item;
use App\Models\Unit;
use App\Models\Promo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PurchaseOrderItem extends Pivot
{
    use SoftDeletes;

    protected $table = 'item_purchase_order';

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-Way: An item is an item.
     *
     * @return mixed
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

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

    /**
     * One-Way: A Purchse Order's Item must have a unit assigned to.
     *
     * @return mixed
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

}
