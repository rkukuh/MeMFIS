<?php

namespace App\Models;

use App\MemfisModel;

class JobTitle extends MemfisModel
{
    protected $table = 'jobtitles';

    protected $fillable = [
        'code',
        'name',
        'description',
        'specification'
    ];
}
