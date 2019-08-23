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
     * One-to-Many: A workshift may have one or many schedule.
     *
     * This function will retrieve all the schedule of a given workshift.
     * See: workshiftschedule workshift() method for the inverse
     *
     * @return mixed
     */
    public function schedule()
    {
        return $this->hasMany(WorkshiftSchedule::class);
    }

}
