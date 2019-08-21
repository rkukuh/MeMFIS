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
        'leave_period',
        'prorate_leave',
        'distribute_evenly',
        'bacK_date',
        'description'
    ];

}
