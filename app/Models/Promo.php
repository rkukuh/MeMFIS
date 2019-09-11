<?php

namespace App\Models;

use App\MemfisModel;

class Promo extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
    ];
}
