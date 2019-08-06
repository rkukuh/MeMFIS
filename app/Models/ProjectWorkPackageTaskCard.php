<?php

namespace App\Models;

use App\MemfisModel;

class ProjectWorkPackageTaskCard extends MemfisModel
{
    protected $table = 'project_workpackage_taskcards';

    protected $fillable = [
        'project_workpackage_id',
        'taskcard_id',
        'sequence',
        'is_mandatory',
        'note',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-Way: A Project WorkPackage TaskCard must have a taskcard assigned to.
     *
     * @return mixed
     */
    public function taskcard()
    {
        return $this->belongsTo(TaskCard::class);
    }

    /**
     * One-to-Many: A project's workpackages may have one or many taskcard.
     *
     * This function will retrieve the header of a project's workpackages.
     * See: Project WorkPackage's taskcards() method for the inverse
     *
     * @return mixed
     */
    public function header()
    {
        return $this->belongsTo(ProjectWorkPackage::class, 'project_workpackage_id');
    }
}
