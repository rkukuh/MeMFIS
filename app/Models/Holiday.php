<?php

namespace App\Models;

use App\MemfisModel;

class Holiday extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'start_date',
        'end_date',
        'description',
    ];
    
}
