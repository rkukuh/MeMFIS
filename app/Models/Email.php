<?php

namespace App\Models;

use App\MemfisModel;

class Email extends MemfisModel
{
    protected $fillable = [
        'address',
        'type_id',
        'is_primary',
        'emailable_id',
        'emailable_type',
    ];
}
