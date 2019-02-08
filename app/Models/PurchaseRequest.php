<?php

namespace App\Models;

use App\MemfisModel;

class PurchaseRequest extends MemfisModel
{
    protected $fillable = [
        'number',
        'type_id',
        'requested_at',
        'required_at',
        'description',
    ];

    protected $dates = ['requested_at', 'required_at'];
}
