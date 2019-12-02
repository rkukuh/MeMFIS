<?php

namespace App\Models;

use App\MemfisModel;

class Nationality extends MemfisModel
{
    protected $table = 'nationalities';

    protected $fillable = [
        'nationality'
    ];
}
