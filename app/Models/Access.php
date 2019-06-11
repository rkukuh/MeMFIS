<?php

namespace App\Models;

use App\MemfisModel;

class Access extends MemfisModel
{
    protected $fillable = [
        'name',
        'accessable_type',
        'accessable_id',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many accesses.
     *
     * This function will get all of the owning accessable models.
     * See:
     * - Aircraft's accesses() method for the inverse
     *
     * @return mixed
     */
    public function accessable()
    {
        return $this->morphTo();
    }

    /**
     * Many-to-Many: A task card may have zero or many (aircraft) access.
     *
     * This function will retrieve all the task cards of an (aircraft) access.
     * See: TaskCard's accesses() method for the inverse
     *
     * @return mixed
     */
    public function taskcards()
    {
        return $this->belongsToMany(TaskCard::class, 'access_taskcard', 'access_id', 'taskcard_id')
                    ->withTimestamps();
    }
}
