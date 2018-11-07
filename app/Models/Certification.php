<?php

namespace App\Models;

use App\MemfisModel;

class Certification extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'authority',
    ];
}
