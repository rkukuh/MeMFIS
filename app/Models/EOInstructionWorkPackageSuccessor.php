<?php

namespace App\Models;

use App\MemfisModel;

class EOInstructionWorkPackageSuccessor extends MemfisModel
{
    protected $table = 'eo_instruction_workpackage_successors';
    
    protected $fillable = [
        'eo_instruction_workpackage_id',
        'next',
        'order',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-Way: A EO-Instruction WorkPackage Successor must have a next (EO-Instruction) assigned to.
     *
     * @return mixed
     */
    public function next()
    {
        return $this->belongsTo(EOInstruction::class);
    }

    /**
     * One-to-Many: A WorkPackage's EO-Instruction may have one or many successor.
     *
     * This function will retrieve the header of a WorkPackage's EO-Instruction.
     * See: EOInstructionWorkPackage's successors() method for the inverse
     *
     * @return mixed
     */
    public function header()
    {
        return $this->belongsTo(EOInstructionWorkPackage::class, 'eo_instruction_workpackage_id');
    }
}
