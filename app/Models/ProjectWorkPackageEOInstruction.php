<?php

namespace App\Models;

use App\MemfisModel;

class ProjectWorkPackageEOInstruction extends MemfisModel
{
    protected $table = 'project_workpackage_eo_instructions';

    protected $fillable = [
        'project_workpackage_id',
        'eo_instruction_id',
        'sequence',
        'is_mandatory',
        'is_rii',
        'note',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-Way: A Project WorkPackage EO-Instruction must have an EO-instruction assigned to.
     *
     * @return mixed
     */
    public function eo_instruction()
    {
        return $this->belongsTo(EOInstruction::class);
    }

    /**
     * One-to-Many: A Project's WorkPackages may have one or many eo_instruction.
     *
     * This function will retrieve the header of a Project's WorkPackages.
     * See: ProjectWorkPackage's eo_instructions() method for the inverse
     *
     * @return mixed
     */
    public function header()
    {
        return $this->belongsTo(ProjectWorkPackage::class, 'project_workpackage_id');
    }
}
