<?php

namespace App\Models;

use App\MemfisModel;

class BankAccount extends MemfisModel
{
    protected $fillable = [
        'bank_id',
        'holder_name',
        'account_number',
        'bank_accountable_id',
        'bank_accountable_type',
    ];
}
