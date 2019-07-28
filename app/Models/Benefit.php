<?php

namespace App\Models;

use App\MemfisModel;

class Benefit extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'base_calculation',
        'prorate_calculation',
        'description',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    // 
}
