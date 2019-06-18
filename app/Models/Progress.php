<?php

namespace App\Models;

use App\MemfisModel;

class Progress extends MemfisModel
{
    protected $fillable = [
        'progressable_type',
        'progressable_id',
        'status_id',
        'reason_id',
        'reason_text',
        'progressed_by',
        'note',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many progresses.
     *
     * This function will get all of the owning progressable models.
     * See:
     * - DefectCard's progresses() method for the inverse
     * - HtCrr's progresses() method for the inverse
     * - JobCard's progresses() method for the inverse
     * - Project's progresses() method for the inverse
     *
     * @return mixed
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
    public function progressedBy()
    {
        return $this->belongsTo(Employee::class, 'progressed_by');
    }

    /**
     * One-Way: A Progress may have a reason behind.
     *
     * @return mixed
     */
    public function reason()
    {
        return $this->belongsTo(Type::class);
    }
}
