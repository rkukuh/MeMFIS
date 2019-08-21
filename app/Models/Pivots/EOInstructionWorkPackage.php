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
     * One-Way: A WorkPackage's EO-Instruction must have a workpackage owning.
     *
     * @return mixed
     */
    public function workpackage()
    {
        return $this->belongsTo(WorkPackage::class);
    }
}
