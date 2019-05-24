<?php

namespace App\Models\Pivots;

use App\Models\Project;
use App\Models\WorkPackage;
use App\Models\ProjectWorkPackageManhour;
use App\Models\ProjectWorkPackageEngineer;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectWorkPackage extends Pivot
{
    use SoftDeletes;

    protected $table = 'project_workpackage';

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A project's workpackages may have one or many engineer.
     *
     * This function will retrieve all the engineer of a project's workpackages.
     * See: Project WorkPackage Engineer's header() method for the inverse
     *
     * @return mixed
     */
    public function engineers()
    {
        return $this->hasMany(ProjectWorkPackageEngineer::class, 'project_workpackage_id');
    }

    /**
     * One-to-Many: A project's workpackages may have one or many manhour.
     *
     * This function will retrieve all the manhour of a project's workpackages.
     * See: Project WorkPackage Manhour's header() method for the inverse
     *
     * @return mixed
     */
    public function manhours()
    {
        return $this->hasMany(ProjectWorkPackageManhour::class, 'project_workpackage_id');
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
