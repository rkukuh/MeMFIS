<?php

namespace App\Models;

use App\MemfisModel;
use App\Models\Pivots\PurchaseOrderItem;

class Promo extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * M-M Polymorphic: A promo can be applied to many entities.
     *
     * This function will get all the POs that are applied by a given promo.
     * See: PurchaseOrder's promos() method for the inverse
     *
     * @return mixed
     */
    public function purchase_orders()
    {
        return $this->morphedByMany(PurchaseOrder::class, 'promoable');
    }

    /**
     * M-M Polymorphic: A promo can be applied to many entities.
     *
     * This function will get all the PO's Items that are applied by a given promo.
     * See: PurchaseOrderItem's promos() method for the inverse
     *
     * @return mixed
     */
    public function purchase_order_items()
    {
        return $this->morphedByMany(PurchaseOrderItem::class, 'promoable');
    }
}
