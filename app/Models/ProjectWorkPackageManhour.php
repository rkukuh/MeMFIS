<?php

namespace App\Models;

use App\MemfisModel;

class ProjectWorkPackageManhour extends MemfisModel
{
    protected $table = 'project_workpackage_manhours';
    
    protected $fillable = [
        'engineer_type_id',
        'proportion_amount'
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-Way: A Project WorkPackage Manhour must have an engineer type assigned to.
     *
     * @return mixed
     */
    public function engineer_type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * One-to-Many: A project's workpackage may have one or many manhour.
     *
     * This function will retrieve all the manhour of a project's workpackages.
     * See: Project WorkPackage's manhours() method for the inverse
     *
     * @return mixed
     */
    public function header()
    {
        return $this->belongsTo(ProjectWorkPackage::class, 'project_workpackage_id');
    }
}
