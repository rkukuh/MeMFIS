<?php

namespace App\Models;

use App\MemfisModel;

class Category extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'of',
        'description',
        'account_code',
    ];
}
