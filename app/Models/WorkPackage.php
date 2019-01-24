<?php

namespace App\Models;

use App\MemfisModel;

class WorkPackage extends MemfisModel
{
    protected $table = 'workpackages';

    protected $fillable = [
        'code',
        'title',
        'is_template',
        'description',
    ];
}
