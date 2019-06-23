<?php

namespace App\Models;

use App\MemfisModel;

class Facility extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'note',
    ];
}
