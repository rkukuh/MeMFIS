<?php

namespace App\Models;

use App\MemfisModel;

class Project extends MemfisModel
{
    protected $fillable = [
        'code',
        'title',
        'no_wo',
        'aircraft_register',
        'aircraft_sn',
    ];
}
