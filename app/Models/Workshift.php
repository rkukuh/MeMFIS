<?php

namespace App\Models;

use App\MemfisModel;

class Workshift extends MemfisModel
{

    protected $fillable = [
        'code',
        'name',
        'description',
    ];

    /**
     * Many-to-Many: An employee may have zero or many workshift.
     *
     * This function will retrieve all the workshift of an employee.
     * See: Workshift's employee() method for the inverse
     *
     * @return mixed
     */
    public function employee()
    {
        return $this->belongsToMany(Employee::class);
    }

    /**
     * One-to-Many: A workshift may have one or many schedule.
     *
     * This function will retrieve all the schedule of a given workshift.
     * See: workshiftschedule workshifts() method for the inverse
     *
     * @return mixed
     */
    public function workshift_schedules()
    {
        return $this->hasMany(WorkshiftSchedule::class);
    }

}
