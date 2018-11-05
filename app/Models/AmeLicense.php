<?php

namespace App\Models;

use App\MemfisModel;

class AmeLicense extends MemfisModel
{
    protected $fillable = [
        'aircraft_id',
        'type_id',
    ];
}
