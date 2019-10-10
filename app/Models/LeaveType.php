<?php

namespace App\Models;

use App\MemfisModel;

class LeaveType extends MemfisModel
{
    
    protected $table = 'leavetypes';

    protected $fillable = [
        'code',
        'name',
        'gender',
        'based',
        'leave_period',
        'prorate_leave',
        'distribute_evently',
        'back_date',
        'description'
    ];

}
