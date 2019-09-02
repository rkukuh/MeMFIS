<?php

namespace App\Models;

use App\MemfisModel;

class Bank extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
    ];
}
