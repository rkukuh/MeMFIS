<?php

namespace App\Models;

use App\MemfisModel;

class Language extends MemfisModel
{
    protected $fillable = [
        'name',
        'iso_639_1',
        'iso_639_2',
    ];

}
