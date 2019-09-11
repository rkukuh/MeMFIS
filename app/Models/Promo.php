<?php

namespace App\Models;

use App\MemfisModel;

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
}
