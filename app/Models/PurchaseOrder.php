<?php

namespace App\Models;

use App\MemfisModel;

class PurchaseOrder extends MemfisModel
{
    protected $fillable = [
        'number',
        'ordered_at',
        'valid_until',
        'ship_at',
        'exchange_rate',
        'total_before_tax',
        'tax_amount',
        'total_after_tax',
        'description',
    ];

    protected $dates = ['ordered_at', 'valid_until', 'ship_at'];
}
