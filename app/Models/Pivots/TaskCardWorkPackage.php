<?php

namespace App\Models\Pivots;

use App\Models\TaskCard;
use App\Models\WorkPackage;
use App\Models\TaskCardWorkPackageSuccessor;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TaskCardWorkPackage extends Pivot
{
    use SoftDeletes;

    protected $table = 'taskcard_workpackage';

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A WorkPackage's TaskCard may have one or many successor.
     *
     * This function will retrieve all the successor of a WorkPackage's TaskCard.
     * See: TaskCardWorkPackageSuccessor's header() method for the inverse
     *
     * @return mixed
     */
    public function successors()
    {
        return $this->hasMany(TaskCardWorkPackageSuccessor::class, 'taskcard_workpackage_id');
    }

    /**
     * One-Way: A WorkPackage's TaskCard must have a task card assigned to.
     *
     * @return mixed
     */
    public function taskcard()
    {
        return $this->belongsTo(TaskCard::class);
    }

    /**
     * One-Way: A WorkPackage's TaskCard must have a workpackage owning.
     *
     * @return mixed
     */
    public function workpackage()
    {
        return $this->belongsTo(WorkPackage::class);
    }
}
