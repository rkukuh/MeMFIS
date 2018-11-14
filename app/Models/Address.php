<?php

namespace App\Models;

use App\MemfisModel;

class Address extends MemfisModel
{
    protected $fillable = [
        'type_id',
        'addresss',
        'latitude',
        'longitude',
        'addressable_id',
        'addressable_type',
    ];
}
