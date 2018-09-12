<?php

namespace App\Models;

use App\MemfisModel;

class Type extends MemfisModel
{
    protected $fillable = [
        'name',
        'of',
    ];
}
