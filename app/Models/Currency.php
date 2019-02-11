<?php

namespace App\Models;

use App\MemfisModel;

class Currency extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'symbol',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A purchase order may have one currency.
     *
     * This function will retrieve all the purchase orders of a currency.
     * See: PurchaseOrder's currency() method for the inverse
     *
     * @return mixed
     */
    public function purchase_orders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }
}
