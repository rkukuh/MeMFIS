<?php

namespace App\Models;

use App\MemfisModel;

class Department extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'parent_id',
    ];
}
