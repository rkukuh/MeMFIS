<?php

namespace App\Models;

use App\MemfisModel;

class Unit extends MemfisModel
{
    protected $fillable = [
        'name',
        'symbol',
        'type_id',
    ];
}
