<?php

namespace App\Models;

use App\MemfisModel;

class Country extends MemfisModel
{
    protected $fillable = [
        'name',
        'iso_2',
        'iso_3',
        'phone_code'
    ];
}
