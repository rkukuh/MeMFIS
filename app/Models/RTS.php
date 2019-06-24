<?php

namespace App\Models;

use App\MemfisModel;

class RTS extends MemfisModel
{
    protected $table = 'rts';

    protected $fillable = [
        'project_id',
        'aircraft_total_time',
        'work_performed',
        'work_data',
        'exception',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all RTS's approvals.
     * See: Approvals's approvable() method for the inverse
     *
     * @return mixed
     */
    public function approvals()
    {
        return $this->morphMany(Approval::class, 'approvable');
    }

    /**
     * One-to-One: A Project have one RTS.
     *
     * This function will retrieve Project of a given RTS.
     * See: Project's rts() method for the inverse
     *
     * @return mixed
     */
    public function project()
    {
        return $this->hasOne(Project::class);
    }
}
