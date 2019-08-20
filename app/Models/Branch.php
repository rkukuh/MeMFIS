<?php

namespace App\Models;

use App\MemfisModel;

class Branch extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'description',
    ];
}
