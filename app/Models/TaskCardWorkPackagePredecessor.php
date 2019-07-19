<?php

namespace App\Models;

use App\MemfisModel;

class TaskCardWorkPackagePredecessor extends MemfisModel
{
    protected $table = 'taskcard_workpackage_predecessors';
    
    protected $fillable = [
        'taskcard_workpackage_id',
        'previous',
        'order',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-Way: A TaskCard WorkPackage Predecessor must have a previous (TaskCard) assigned to.
     *
     * @return mixed
     */
    public function previous()
    {
        return $this->belongsTo(TaskCard::class);
    }

    /**
     * One-to-Many: A WorkPackage's TaskCard may have one or many predecessor.
     *
     * This function will retrieve the header of a WorkPackage's TaskCard.
     * See: TaskCardWorkPackage's predecessors() method for the inverse
     *
     * @return mixed
     */
    public function header()
    {
        return $this->belongsTo(TaskCardWorkPackage::class, 'taskcard_workpackage_id');
    }
}
