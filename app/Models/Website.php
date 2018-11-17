<?php

namespace App\Models;

use App\MemfisModel;

class Website extends MemfisModel
{
    protected $fillable = [
        'url',
        'type_id',
        'websiteable_id',
        'websiteable_type',
    ];
}
