<?php

namespace App\Models;

use App\MemfisModel;

class LeavePeriod extends MemfisModel
{
    protected $table = 'leaveperiods';

    protected $fillable = [
        'code',
        'name',
        'period_start',
        'period_end',
        'description'
    ];
}
