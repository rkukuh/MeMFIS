<?php

namespace App\Models;

use App\MemfisModel;

class Status extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'of',
        'description',
    ];
}
