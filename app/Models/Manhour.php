<?php

namespace App\Models;

use App\MemfisModel;
use App\Models\Pivots\QuotationWorkPackage;

class Manhour extends MemfisModel
{
    protected $fillable = [
        'rate',
        'level',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: An HT/CRR may have one manhour rate.
     *
     * This function will all the HT/CRRs of a given manhour rate.
     * See: HtCrr's manhour_rate() method for the inverse
     *
     * @return mixed
     */
    public function htcrr()
    {
        return $this->hasMany(HtCrr::class, 'manhour_rate_id');
    }

    /**
     * One-to-Many: A Quotation's WorkPackage may have one or many manhour rate.
     *
     * This function will retrieve all the quotation's workpackages of a given manhour.
     * See: QuotationWorkPackage's manhour_rate() method for the inverse
     *
     * @return mixed
     */
    public function quotation_workpackages()
    {
        return $this->belongsTo(QuotationWorkPackage::class, 'manhour_rate_id');
    }
}
