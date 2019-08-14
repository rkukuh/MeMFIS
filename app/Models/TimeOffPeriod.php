<?php

namespace App\Models;

use App\MemfisModel;

class TimeOffPeriod extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'period_start',
        'period_end',
        'description',
    ];
}
