<?php

namespace App\Models;

use App\MemfisModel;

class Religion extends MemfisModel
{
    protected $table = 'religions';

    protected $fillable = [
        'code',
        'number',
        'description'
    ];
}
