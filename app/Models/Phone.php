<?php

namespace App\Models;

use App\MemfisModel;

class Phone extends MemfisModel
{
    protected $fillable = [
        'number',
        'ext',
        'type_id',
        'is_primary',
        'phoneable_id',
        'phoneable_type',
    ];
}
