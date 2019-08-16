<?php

namespace App\Models\Pivots;

use App\Models\Manhour;
use App\Models\Quotation;
use App\Models\WorkPackage;
use App\Models\QuotationWorkPackageItem;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class QuotationWorkPackage extends Pivot
{
    use SoftDeletes;

    protected $table = 'quotation_workpackage';

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A Quotation's WorkPackage may have one or many item.
     *
     * This function will retrieve all the item of a Quotation's WorkPackage.
     * See: QuotationWorkPackageItem's header() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->hasMany(QuotationWorkPackageItem::class, 'quotation_workpackage_id');
    }

    /**
     * One-to-Many: A Quotation's WorkPackage may have one or many manhour rate.
     *
     * This function will retrieve manhour rate of a Quotation's WorkPackage.
     * See: Manhour's quotation_workpackages() method for the inverse
     *
     * @return mixed
     */
    public function manhour_rate()
    {
        return $this->belongsTo(Manhour::class, 'manhour_rate_id');
    }

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
