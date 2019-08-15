<?php

namespace App\Models;

use App\MemfisModel;

class Manhour extends MemfisModel
{
    protected $fillable = [
        'rate',
        'level',
    ];
}
