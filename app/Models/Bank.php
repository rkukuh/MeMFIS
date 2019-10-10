<?php

namespace App\Models;

use App\MemfisModel;

class Bank extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A bank account must related to a bank
     *
     * This function will retrieve all the bank accounts of a bank.
     * See: BankAccount's bank() method for the inverse
     *
     * @return mixed
     */
    public function bank_accounts()
    {
        return $this->hasMany(BankAccount::class);
    }
}
