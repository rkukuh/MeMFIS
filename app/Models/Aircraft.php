<?php

namespace App\Models;

use App\MemfisModel;

class Aircraft extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'manufacturer_id',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many accesses.
     *
     * This function will get all of the aircraft's accesses.
     * See: Access's accessable() method for the inverse
     */
    public function accesses()
    {
        return $this->morphMany(Access::class, 'accessable');
    }

    /**
     * M-M Polymorph: An AMEL content could be aircraft and/or engine.
     *
     * This function will aet all of the aircraft's AMEL.
     * Amel's amelable() method for the inverse
     *
     * @return mixed
     */
    public function amels()
    {
        return $this->morphToMany(Amel::class, 'amelable');
    }

    /**
     * One-to-Many: A manufacturer may have zero or many aircrafts.
     *
     * This function will retrieve the manufacturer of an aircraft.
     * See: Manufacturer's aircrafts() method for the inverse
     *
     * @return mixed
     */
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    /**
     * One-to-Many: A project must have an aircraft
     *
     * This function will retrieve all the projects of an aircraft.
     * See: Project's aircraft() method for the inverse
     *
     * @return mixed
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Polymorphic: An entity can have zero or many stations.
     *
     * This function will get all of the aircraft's stations.
     * See: Station's stationable() method for the inverse
     */
    public function stations()
    {
        return $this->morphMany(Station::class, 'stationable');
    }

    /**
     * Many-to-Many: A task card may have zero or many aircraft.
     *
     * This function will retrieve all the task cards of an aircraft.
     * See: TaskCard's aircrafts() method for the inverse
     *
     * @return mixed
     */
    public function taskcards()
    {
        return $this->belongsToMany(TaskCard::class, 'aircraft_taskcard', 'aircraft_id', 'taskcard_id')
                    ->withTimestamps();
    }

    /**
     * One-to-Many: A workpackage must have an aircraft
     *
     * This function will retrieve all the projects of a workpackage.
     * See: WorkPackage's aircraft() method for the inverse
     *
     * @return mixed
     */
    public function workpackages()
    {
        return $this->hasMany(WorkPackage::class);
    }

    /**
     * Polymorphic: An entity can have zero or many zones.
     *
     * This function will get all of the aircraft's zones.
     * See: Zone's accessable() method for the inverse
     */
    public function zones()
    {
        return $this->morphMany(Zone::class, 'zoneable');
    }

}
