<?php

namespace App\Models\Pivots;

use App\Models\Project;
use App\Models\WorkPackage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectWorkpackage extends Pivot
{
    use SoftDeletes;

    /*************************************** RELATIONSHIP ****************************************/

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
