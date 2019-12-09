<?php

namespace App\Models;

use App\MemfisModel;

class History extends MemfisModel
{
    protected $fillable = [
        'data',
        'user_id',
        'description',
    ];
}
