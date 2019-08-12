<?php

namespace App\Models;

use App\MemfisModel;

class QuotationDefectCardItem extends MemfisModel
{
    protected $table = 'quotation_defectcard_items';

    protected $fillable = [
        'quotation_id',
        'defectcard_id',
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
     * One-Way: A Quotation's Defect Card's Item must have a defect card assigned to.
     *
     * @return mixed
     */
    public function defectcard()
    {
        return $this->belongsTo(DefectCard::class);
    }

    /**
     * One-Way: A Quotation's Defect Card's Item must have an item assigned to.
     *
     * @return mixed
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * One-Way: A Quotation's Defect Card's Item must have a rental price assigned to.
     *
     * @return mixed
     */
    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    /**
     * One-Way: A Quotation's Defect Card's Item must have a quotation assigned to.
     *
     * @return mixed
     */
    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    /**
     * One-Way: A Quotation's Defect Card's Item must have a unit assigned to.
     *
     * @return mixed
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
