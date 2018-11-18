<?php

namespace App\Models;

use App\MemfisModel;

class Note extends MemfisModel
{
    protected $fillable = [
        'body',
        'noteable_id',
        'noteable_type',
    ];
}
