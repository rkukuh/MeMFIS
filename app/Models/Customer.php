<?php

namespace App\Models;

use App\MemfisModel;

class Customer extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'payment_term',
        'banned_at',
        'account_code',
    ];

    protected $dates = ['banned_at'];
}
