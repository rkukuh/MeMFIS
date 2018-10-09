<?php

namespace App\Models;

use App\MemfisModel;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Item extends MemfisModel implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'code',
        'name',
        'barcode',
        'category_id',
        'description',
        'is_ppn',
        'ppn_amount',
        'is_stock',
        'account_code',
    ];
}
