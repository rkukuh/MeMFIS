<?php

namespace App\Models\Pivots;

use App\Models\TaskCard;
use App\Models\WorkPackage;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TaskCardWorkPackage extends Pivot
{
    use SoftDeletes;

    protected $table = 'taskcard_workpackage';

    /*************************************** RELATIONSHIP ****************************************/

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
