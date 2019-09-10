<?php

namespace App\Models;

use App\MemfisModel;

class School extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'degree',
    ];

    /*************************************** RELATIONSHIP ****************************************/
}
