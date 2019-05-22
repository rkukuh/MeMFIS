<?php

namespace App\Models\Pivots;

use App\Models\Project;
use App\Models\WorkPackage;
use App\Models\ProjectWorkpackageEngineer;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectWorkpackage extends Pivot
{
    use SoftDeletes;

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A project's workpackages may have one or many engineer.
     *
     * This function will retrieve all the engineer of a project's workpackages.
     * See: Project Workpackage Engineer's header() method for the inverse
     *
     * @return mixed
     */
    public function engineers()
    {
        // This method must have a second parameter as FK column (project_workpackage_id),
        // so these following error will not thrown:
        // "Too few arguments to function Illuminate\Database\Eloquent\Model::setAttribute()"

        return $this->hasMany(ProjectWorkpackageEngineer::class, 'project_workpackage_id');
    }

    /**
     * One-Way: A Project' WorkPackages must have a project assigned to.
     *
     * @return mixed
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * One-Way: A Project' WorkPackages must have a workpackage assigned to.
     *
     * @return mixed
     */
    public function workpackage()
    {
        return $this->belongsTo(WorkPackage::class);
    }
}
