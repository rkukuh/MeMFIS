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
     * See: BankAccount's currency() method for the inverse
     *
     * @return mixed
     */
    public function bank_accounts()
    {
        return $this->hasMany(BankAccount::class);
    }

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

    /**
     * One-to-Many: A quotation may have one currency.
     *
     * This function will retrieve all the quotations of a currency.
     * See: Quotation's currency() method for the inverse
     *
     * @return mixed
     */
    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }
}
