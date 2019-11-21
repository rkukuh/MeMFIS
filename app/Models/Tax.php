<?php

namespace App\Models;

use App\MemfisModel;

class Tax extends MemfisModel
{
    protected $fillable = [
        'taxable_type',
        'taxable_id',
        'method_type_id',
        'type_id',
        'percent',
        'amount',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many taxes.
     *
     * This function will get all of the owning taxable models.
     * See:
     * - PurchaseOrder's taxes() method for the inverse
     * - Quotation's taxes() method for the inverse
     *
     * @return mixed
     */
    public function taxable()
    {
        return $this->morphTo();
    }

    /**
     * One-Way: A tax may have zero or many type.
     *
     * This function will retrieve the type of a tax.
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
