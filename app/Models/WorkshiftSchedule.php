<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkshiftSchedule extends Model
{
    
    protected $fillable = [
        'workshift_id',
        'days',
        'in',
        'break_in',
        'break_out',
        'out',
    ];

    /**
     * One-to-Many: A workshift may have one or many schedule.
     *
     * This function will retrieve all the schedule of a given workshift.
     * See: workshift workshift_schedules() method for the inverse
     *
     * @return mixed
     */
    public function workshifts()
    {
        return $this->belongsTo(Workshift::class);
    }

}
