<?php

namespace App\Models;

use App\MemfisModel;
use Illuminate\Database\Eloquent\Builder;

class Level extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'of',
        'score',
        'description',
    ];
}
