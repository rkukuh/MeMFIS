<?php

namespace App\Models;

use App\MemfisModel;

class History extends MemfisModel
{
    protected $fillable = [
        'data',
        'user_id'
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many histories.
     *
     * This function will get all of the owning accessable models.
     * See:
     * - Employee's data_histories() method for the inverse
     *
     * @return mixed
     */
    public function historiable()
    {
        return $this->morphTo();
    }

     /**
     * One-to-Many: A history (of anything) may have one conductor.
     *
     * This function will retrieve the employee of doing (anything).
     * See: Employee's histories() method for the inverse
     *
     * @return mixed
     */
    public function conductedBy()
    {
        return $this->belongsTo(Employee::class, 'user_id');
    }

}
