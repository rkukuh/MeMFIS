<?php

namespace App\Models;

use App\MemfisModel;

class Category extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'account_code',
    ];
}
