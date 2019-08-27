<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EOInstructionWorkPackage extends Pivot
{
    use SoftDeletes;

    protected $table = 'eo_instruction_workpackage';

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-Way: A WorkPackage's EO-Instruction must have an EO-instruction assigned to.
     *
     * @return mixed
     */
    public function eo_instruction()
    {
        return $this->belongsTo(EOInstruction::class);
    }

    /**
     * One-to-Many: A WorkPackage's EO-Instruction may have one or many predecessor.
     *
     * This function will retrieve all the predecessor of a WorkPackage's EO-Instruction.
     * See: EOInstructionWorkPackagePredecessor's header() method for the inverse
     *
     * @return mixed
     */
    public function predecessors()
    {
        return $this->hasMany(EOInstructionWorkPackagePredecessor::class, 'eo_instruction_workpackage_id');
    }

    /**
     * One-to-Many: A WorkPackage's EO-Instruction may have one or many successor.
     *
     * This function will retrieve all the successor of a WorkPackage's EO-Instruction.
     * See: EOInstructionWorkPackageSuccessor's header() method for the inverse
     *
     * @return mixed
     */
    public function successors()
    {
        return $this->hasMany(EOInstructionWorkPackageSuccessor::class, 'eo_instruction_workpackage_id');
    }

    /**
     * One-Way: A WorkPackage's EO-Instruction must have a workpackage owning.
     *
     * @return mixed
     */
    public function workpackage()
    {
        return $this->belongsTo(WorkPackage::class);
    }
}
