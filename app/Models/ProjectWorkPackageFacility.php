<?php

namespace App\Models;

use App\MemfisModel;

class ProjectWorkPackageFacility extends MemfisModel
{
    protected $table = 'project_workpackage_facilities';
    
    protected $fillable = [
        'project_workpackage_id',
        'facility_id',
        'price_id',
        'price_amount',
        'note',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-Way: A Project WorkPackage Facitlity must have a facility assigned to.
     *
     * @return mixed
     */
    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    /**
     * One-to-Many: A project's workpackage may have one or many facility.
     *
     * This function will retrieve the header of a project's workpackage.
     * See: Project WorkPackage's facilities() method for the inverse
     *
     * @return mixed
     */
    public function header()
    {
        return $this->belongsTo(ProjectWorkPackage::class, 'project_workpackage_id');
    }

    /**
     * One-Way: A Project WorkPackage Facitlity must have a rental price assigned to.
     *
     * @return mixed
     */
    public function price()
    {
        return $this->belongsTo(Price::class);
    }
}
