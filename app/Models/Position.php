<?php

namespace App\Models;

use App\MemfisModel;

class Position extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'description',
    ];
}
