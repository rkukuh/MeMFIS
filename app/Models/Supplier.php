<?php

namespace App\Models;

use App\MemfisModel;

class Supplier extends MemfisModel
{
    protected $fillable = ['code'];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A purchase order may have one supplier.
     *
     * This function will retrieve all the purchase orders of a supplier.
     * See: PurchaseOrder's supplier() method for the inverse
     *
     * @return mixed
     */
    public function purchase_orders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }
}
