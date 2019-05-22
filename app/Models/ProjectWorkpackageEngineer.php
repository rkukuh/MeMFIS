<?php

namespace App\Models;

use App\MemfisModel;
use App\Models\Pivots\ProjectWorkpackage;

class ProjectWorkpackageEngineer extends MemfisModel
{
    protected $fillable = [
        'skill_id',
        'engineer_id',
        'tat',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-Way: A Project Workpackage Engineer must have an engineer assigned to.
     *
     * @return mixed
     */
    public function engineer()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * One-to-Many: A project's workpackage may have one or many engineer.
     *
     * This function will retrieve the header of a project's workpackage.
     * See: Project Workpackage's engineers() method for the inverse
     *
     * @return mixed
     */
    public function header()
    {
        return $this->belongsTo(ProjectWorkpackage::class, 'project_workpackage_id');
    }

    /**
     * One-Way: A Project Workpackage Engineer must have a skill assigned to.
     *
     * @return mixed
     */
    public function skill()
    {
        return $this->belongsTo(Type::class);
    }
}
