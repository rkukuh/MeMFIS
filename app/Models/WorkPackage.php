<?php

namespace App\Models;

use App\MemfisModel;

class WorkPackage extends MemfisModel
{
    protected $table = 'workpackages';

    protected $fillable = [
        'code',
        'title',
        'is_template',
        'description',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A workpackage must have an aircraft
     *
     * This function will retrieve the aircraft of a workpackage.
     * See: Aircraft's workpackages() method for the inverse
     *
     * @return mixed
     */
    public function aircraft()
    {
        return $this->belongsTo(Aircraft::class);
    }

    /**
     * Many-to-Many: A project may have one or many workpackage.
     *
     * This function will retrieve all the projects of a work package.
     * See: Project's workpackages() method for the inverse
     *
     * @return mixed
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_workpackage', 'workpackage_id', 'project_id')
                    ->withTimestamps();
    }
}
