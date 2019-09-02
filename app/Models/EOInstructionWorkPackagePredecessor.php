<?php

namespace App\Models;

use App\MemfisModel;

class EOInstructionWorkPackagePredecessor extends MemfisModel
{
    protected $table = 'eo_instruction_workpackage_predecessors';

    protected $fillable = [
        'eo_instruction_workpackage_id',
        'previous',
        'order',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-Way: A EO-Instruction WorkPackage Predecessor must have a previous (EO-Instruction) assigned to.
     *
     * @return mixed
     */
    public function previous()
    {
        return $this->belongsTo(TaskCard::class);
    }

    /**
     * One-to-Many: A WorkPackage's EO-Instruction may have one or many predecessor.
     *
     * This function will retrieve the header of a WorkPackage's EOInstruction.
     * See: EOInstructionWorkPackage's predecessors() method for the inverse
     *
     * @return mixed
     */
    public function header()
    {
        return $this->belongsTo(EOInstructionWorkPackage::class, 'eo_instruction_workpackage_id');
    }
}
