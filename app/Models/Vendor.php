<?php

namespace App\Models;

use App\MemfisModel;

class Vendor extends MemfisModel
{
    protected $fillable = [
        'code',
        'name'
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A purchase order may have one vendor.
     *
     * This function will retrieve all the purchase orders of a vendor.
     * See: PurchaseOrder's vendor() method for the inverse
     *
     * @return mixed
     */
    public function purchase_orders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }
}
