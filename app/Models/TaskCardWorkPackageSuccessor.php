<?php

namespace App\Models;

use App\MemfisModel;
use App\Models\Pivots\TaskCardWorkPackage;

class TaskCardWorkPackageSuccessor extends MemfisModel
{
    protected $table = 'taskcard_workpackage_successors';
    
    protected $fillable = [
        'taskcard_workpackage_id',
        'next',
        'order',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-Way: A TaskCard WorkPackage Successor must have a next (TaskCard) assigned to.
     *
     * @return mixed
     */
    public function next()
    {
        return $this->belongsTo(TaskCard::class);
    }

    /**
     * One-to-Many: A WorkPackage's TaskCard may have one or many successor.
     *
     * This function will retrieve the header of a WorkPackage's TaskCard.
     * See: TaskCardWorkPackage's successors() method for the inverse
     *
     * @return mixed
     */
    public function header()
    {
        return $this->belongsTo(TaskCardWorkPackage::class, 'taskcard_workpackage_id');
    }
}
