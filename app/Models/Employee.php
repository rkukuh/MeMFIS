<?php

namespace App\Models;

use App\MemfisModel;

class Employee extends MemfisModel
{
    protected $fillable = [
        'code',
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'gender',
        'hired_at',
    ];
}
