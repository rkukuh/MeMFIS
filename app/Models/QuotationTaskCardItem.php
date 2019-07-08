<?php

namespace App\Models;

use App\MemfisModel;
use App\Models\Pivots\QuotationTaskCard;

class QuotationTaskCardItem extends MemfisModel
{
    protected $table = 'quotation_taskcard_items';

    protected $fillable = [
        'taskcard_workpackage_id',
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
     * One-to-Many: A Quotation's TaskCard may have one or many item.
     *
     * This function will retrieve the header of a Quotation's TaskCard.
     * See: QuotationTaskCard's items() method for the inverse
     *
     * @return mixed
     */
    public function header()
    {
        return $this->belongsTo(QuotationTaskCard::class, 'taskcard_workpackage_id');
    }

    /**
     * One-Way: A Quotation's TaskCard's Item must have an item assigned to.
     *
     * @return mixed
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * One-Way: A Quotation's TaskCard's Item must have a rental price assigned to.
     *
     * @return mixed
     */
    public function price()
    {
        return $this->belongsTo(Price::class);
    }
}
