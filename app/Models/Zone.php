<?php

namespace App\Models;

use App\MemfisModel;

class Zone extends MemfisModel
{
    protected $fillable = [
        'name',
        'zoneable_type',
        'zoneable_id',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many zones.
     *
     * This function will get all of the owning zoneable models.
     * See:
     * - Aircraft's zones() method for the inverse
     *
     * @return mixed
     */
    public function zoneable()
    {
        return $this->morphTo();
    }

    /**
     * Many-to-Many: A task card may have zero or many (aircraft) zone.
     *
     * This function will retrieve all the task cards of an (aircraft) zone.
     * See: TaskCard's zones() method for the inverse
     *
     * @return mixed
     */
    public function taskcards()
    {
        return $this->belongsToMany(TaskCard::class, 'taskcard_zone', 'zone_id', 'taskcard_id')
                    ->withTimestamps();
    }
}
