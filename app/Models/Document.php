<?php

namespace App\Models;

use App\MemfisModel;

class Document extends MemfisModel
{
    protected $fillable = [
        'number',
        'type_id',
        'documentable_id',
        'documentable_type',
    ];
}
