<?php

namespace App\Models;

use App\MemfisModel;

class Storage extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'account_code',
        'is_active',
    ];
}
