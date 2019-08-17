<?php

namespace App\Models;

use App\MemfisModel;

class LeaveType extends MemfisModel
{
    
    protected $table = 'leavetypes';

    protected $fillable = [
        'code',
        'name',
        'leave_period',
        'prorate_leave',
        'description'
    ];

}
