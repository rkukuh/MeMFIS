<?php

namespace App\models;

use App\MemfisModel;

class Status extends MemfisModel
{
    protected $fillable = [
        'name',
        'of',
    ];
}
