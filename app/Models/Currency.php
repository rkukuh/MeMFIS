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
}
