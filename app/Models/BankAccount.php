<?php

namespace App\Models;

use App\MemfisModel;

class BankAccount extends MemfisModel
{
    protected $fillable = [
        'number',
        'name',
        'swift_code',
        'bank_accountable_type',
        'bank_accountable_id',
        'bank_id',
        'currency_id',
        'created_at',
        'updated_at'
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many bank accounts.
     *
     * This function will get all of the owning bank_accountable models.
     * See:
     * - Company's bank_accounts() method for the inverse
     * - Customer's bank_accounts() method for the inverse
     * - Branch's bank_accounts() method for the inverse
     * - Employee's bank_accounts() method for the inverse
     * - Vendor's bank_accounts() method for the inverse
     *
     * @return mixed
     */
    public function bank_accountable()
    {
        return $this->morphTo();
    }

    /**
     * One-to-Many: A bank account must related to a bank
     *
     * This function will retrieve the bank of a bank_account.
     * See: Bank's bank_accounts() method for the inverse
     *
     * @return mixed
     */
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    /**
     * One-to-Many: A bank account may have one currency.
     *
     * This function will retrieve the currency of a bank account.
     * See: Currency's bank_accounts() method for the inverse
     *
     * @return mixed
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
