<?php

namespace App\Models;

use App\MemfisModel;

class Inspection extends MemfisModel
{
    protected $fillable = [
        'inspectable_type',
        'inspectable_id',
        'inspected_by',
        'is_rii',
        'note',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many inspections.
     *
     * This function will get all of the owning inspectable models.
     * See:
     * - JobCard's inspections() method for the inverse
     */
    public function inspectable()
    {
        return $this->morphTo();
    }

    /**
     * One-to-Many: An inspection (of anything) may have one doer.
     *
     * This function will retrieve the doer of a given inspection (of anything).
     * See: Employee's inspections() method for the inverse
     *
     * @return mixed
     */
    public function inspectedBy()
    {
        return $this->belongsTo(Employee::class, 'inspected_by');
    }
}
