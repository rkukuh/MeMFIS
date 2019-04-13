<?php

namespace App\Models;

use App\MemfisModel;

class Station extends MemfisModel
{
    protected $fillable = [
        'name',
        'stationable_type',
        'stationable_id',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many stations.
     *
     * This function will get all of the owning stationable models.
     * See:
     * - Aircraft's stations() method for the inverse
     */
    public function stationable()
    {
        return $this->morphTo();
    }

    /**
     * Many-to-Many: A task card may have zero or many (aircraft) station.
     *
     * This function will retrieve all the task cards of an (aircraft) station.
     * See: TaskCard's stations() method for the inverse
     *
     * @return mixed
     */
    public function taskcards()
    {
        return $this->belongsToMany(TaskCard::class, 'station_taskcard', 'station_id', 'taskcard_id')
                    ->withTimestamps();
    }
}
