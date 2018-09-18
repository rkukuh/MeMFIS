<?php

namespace App\Models;

use App\MemfisModel;

class Journal extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'type_id',
        'level',
        'description',
    ];

}
