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

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A leave Type have zero or many leave.
     *
     * This function will retrieve leaves of a given leave type.
     * See: Leave's leaveType() method for the inverse
     *
     * @return mixed
     */
    public function leave()
    {
        return $this->hasMany(Leave::class);
    }
}
