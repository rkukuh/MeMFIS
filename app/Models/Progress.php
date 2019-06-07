<?php

namespace App\Models;

use App\MemfisModel;

class Progress extends MemfisModel
{
    protected $fillable = [
        'progressable_type',
        'progressable_id',
        'status_id',
        'conducted_by',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many progresses.
     *
     * This function will get all of the owning progressable models.
     * See:
     * - JobCard's progresses() method for the inverse
     */
    public function progressable()
    {
        return $this->morphTo();
    }

    /**
     * One-to-Many: A progress (of anything) may have one doer.
     *
     * This function will retrieve the doer of a given progress (of anything).
     * See: Employee's progresses() method for the inverse
     *
     * @return mixed
     */
    public function conductedBy()
    {
        return $this->belongsTo(Employee::class, 'conducted_by');
    }
}
