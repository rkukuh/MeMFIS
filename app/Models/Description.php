<?php

namespace App\Models;

use App\MemfisModel;

class Description extends MemfisModel
{
    protected $fillable = [
        'body',
        'descriptionable_id',
        'descriptionable_type',
    ];
}
