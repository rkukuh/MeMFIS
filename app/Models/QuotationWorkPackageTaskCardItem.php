<?php

namespace App\Models;

use App\MemfisModel;

class QuotationWorkPackageTaskCardItem extends MemfisModel
{
    protected $table = 'item_quotation_taskcard_workpackage';

    protected $fillable = [
        'quotation_id',
        'workpackage_id',
        'taskcard_id',
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
     * One-Way: A Quotation's WorkPackage's TaskCard's Item must have an item assigned to.
     *
     * @return mixed
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * One-Way: A Quotation's WorkPackage's TaskCard's Item must have a rental price assigned to.
     *
     * @return mixed
     */
    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    /**
     * One-Way: A Quotation's WorkPackage's TaskCard's Item must have a quotation assigned to.
     *
     * @return mixed
     */
    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    /**
     * One-Way: A Quotation's WorkPackage's TaskCard's Item must have a taskcard assigned to.
     *
     * @return mixed
     */
    public function taskcard()
    {
        return $this->belongsTo(TaskCard::class);
    }

    /**
     * One-Way: A Quotation's WorkPackage's TaskCard's Item must have a unit assigned to.
     *
     * @return mixed
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * One-Way: A Quotation's WorkPackage's TaskCard's Item must have a workpackage assigned to.
     *
     * @return mixed
     */
    public function workpackage()
    {
        return $this->belongsTo(WorkPackage::class);
    }
}
