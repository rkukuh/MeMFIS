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
     * Polymorphic: An entity can have zero or many bank accounts.
     *
     * This function will get all Vendor's bank accounts.
     * See: BankAccount's bank_accountable() method for the inverse
     *
     * @return mixed
     */
    public function bank_accounts()
    {
        return $this->morphMany(BankAccount::class, 'bank_accountable');
    }

    /**
     * One-to-Many: A good recieved may have one vendor.
     *
     * This function will retrieve all the good recieveds of a vendor.
     * See: GoodRecieved's vendor() method for the inverse
     *
     * @return mixed
     */
    public function good_receiveds()
    {
        return $this->hasMany(GoodsReceived::class);
    }

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
