<?php

namespace App\Models;

use App\MemfisModel;

class QuotationWorkPackageHtcrrItem extends MemfisModel
{
    protected $table = 'htcrr_item_quotation_workpackage';

    protected $fillable = [
        'quotation_id',
        'workpackage_id',
        'htcrr_id',
        'item_id',
        'quantity',
        'unit_id',
        'price_id',
        'price_amount',
        'subtotal',
        'note',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-Way: A Quotation's WorkPackage's HT/CRR's Item must have a ht/crr assigned to.
     *
     * @return mixed
     */
    public function htcrr()
    {
        return $this->belongsTo(HtCrr::class);
    }

    /**
     * One-Way: A Quotation's WorkPackage's HT/CRR's Item must have an item assigned to.
     *
     * @return mixed
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * One-Way: A Quotation's WorkPackage's HT/CRR's Item must have a rental price assigned to.
     *
     * @return mixed
     */
    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    /**
     * One-Way: A Quotation's WorkPackage's HT/CRR's Item must have a quotation assigned to.
     *
     * @return mixed
     */
    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    /**
     * One-Way: A Quotation's WorkPackage's HT/CRR's Item must have a unit assigned to.
     *
     * @return mixed
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * One-Way: A Quotation's WorkPackage's HT/CRR's Item must have a workpackage assigned to.
     *
     * @return mixed
     */
    public function workpackage()
    {
        return $this->belongsTo(WorkPackage::class);
    }
}
