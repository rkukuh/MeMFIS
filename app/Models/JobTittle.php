<?php

namespace App\Models;

use App\MemfisModel;

class JobTittle extends MemfisModel
{
    protected $table = 'jobtittles';

    protected $fillable = [
        'code',
        'name',
        'description',
        'specification'
    ];
}
