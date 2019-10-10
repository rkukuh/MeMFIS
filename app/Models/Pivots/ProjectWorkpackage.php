<?php

namespace App\Models\Pivots;

use App\Models\Project;
use App\Models\WorkPackage;
use App\Models\ProjectWorkPackageManhour;
use App\Models\ProjectWorkPackageEngineer;
use App\Models\ProjectWorkPackageFacility;
use App\Models\ProjectWorkPackageTaskCard;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProjectWorkPackageEOInstruction;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectWorkPackage extends Pivot
{
    use SoftDeletes;

    protected $table = 'project_workpackage';

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A Project's WorkPackages may have one or many engineer.
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
     * One-to-Many: A Project's WorkPackages may have one or many EO-instruction.
     *
     * This function will retrieve all the EO-instruction of a project's workpackages.
     * See: ProjectWorkPackageEOInstruction's header() method for the inverse
     *
     * @return mixed
     */
    public function eo_instructions()
    {
        return $this->hasMany(ProjectWorkPackageEOInstruction::class, 'project_workpackage_id');
    }

    /**
     * One-to-Many: A Project's WorkPackages may have one or many facility.
     *
     * This function will retrieve all the facility of a project's workpackages.
     * See: Project WorkPackage Engineer's header() method for the inverse
     *
     * @return mixed
     */
    public function facilities()
    {
        return $this->hasMany(ProjectWorkPackageFacility::class, 'project_workpackage_id');
    }

    /**
     * One-to-Many: A Project's WorkPackages may have one or many manhour.
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
     * One-Way: A Project's WorkPackages must have a project assigned to.
     *
     * @return mixed
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * One-to-Many: A Project's WorkPackages may have one or many taskcard.
     *
     * This function will retrieve all the taskcard of a project's workpackages.
     * See: Project WorkPackage TaskCard's header() method for the inverse
     *
     * @return mixed
     */
    public function taskcards()
    {
        return $this->hasMany(ProjectWorkPackageTaskCard::class, 'project_workpackage_id');
    }

    /**
     * One-Way: A Project's WorkPackages must have a workpackage assigned to.
     *
     * @return mixed
     */
    public function workpackage()
    {
        return $this->belongsTo(WorkPackage::class);
    }
}
