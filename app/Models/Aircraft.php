<?php

namespace App\Models;

use App\MemfisModel;

class Aircraft extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'manufacturer_id',
    ];
}
