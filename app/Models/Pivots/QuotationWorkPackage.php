<?php

namespace App\Models\Pivots;

use App\Models\Quotation;
use App\Models\WorkPackage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class QuotationWorkPackage extends Pivot
{
    use SoftDeletes;

    protected $table = 'quotation_workpackage';

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-Way: A Quotation's WorkPackages must have a quotation owning to.
     *
     * @return mixed
     */
    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    /**
     * One-Way: A Quotation's WorkPackages must have a workpackage assigned to.
     *
     * @return mixed
     */
    public function workpackage()
    {
        return $this->belongsTo(WorkPackage::class);
    }
}
