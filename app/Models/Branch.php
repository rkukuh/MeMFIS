<?php

namespace App\Models;

use App\MemfisModel;

class Branch extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'description',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many bank accounts.
     *
     * This function will get all Branch's bank accounts.
     * See: BankAccount's bank_accountable() method for the inverse
     *
     * @return mixed
     */
    public function bank_accounts()
    {
        return $this->morphMany(BankAccount::class, 'bank_accountable');
    }

    /**
     * One-to-Many: A company may have zero or many branches.
     *
     * This function will retrieve the company of a given branch.
     * See: Company's branches() method for the inverse
     *
     * @return mixed
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
