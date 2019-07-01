<?php

namespace App\Models;

use App\MemfisModel;
use App\Models\Pivots\QuotationWorkPackage;

class QuotationWorkPackageItem extends MemfisModel
{
    protected $table = 'quotation_workpackage_items';
    
    protected $fillable = [
        'quotation_workpackage_id',
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
     * One-to-Many: A Quotation's WorkPackages may have one or many item.
     *
     * This function will retrieve the header of a Quotation's WorkPackage.
     * See: Quotation WorkPackage's items() method for the inverse
     *
     * @return mixed
     */
    public function header()
    {
        return $this->belongsTo(QuotationWorkPackage::class, 'quotation_workpackage_id');
    }

    /**
     * One-Way: A Quotation WorkPackage Item must have an item assigned to.
     *
     * @return mixed
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * One-Way: A Quotation WorkPackage Item must have a rental price assigned to.
     *
     * @return mixed
     */
    public function price()
    {
        return $this->belongsTo(Price::class);
    }
}
