<?php

namespace App\Models;

use App\MemfisModel;

class PurchaseOrder extends MemfisModel
{
    protected $fillable = [
        'number',
        'ordered_at',
        'valid_until',
        'ship_at',
        'exchange_rate',
        'total_before_tax',
        'tax_amount',
        'total_after_tax',
        'purchase_request_id',
        'supplier_id',
        'description',
    ];

    protected $dates = ['ordered_at', 'valid_until', 'ship_at'];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A purchase request may have one or many purchase order.
     *
     * This function will retrieve the purchase request of a purchase order.
     * See: PurchaseRequest's purchase_orders() method for the inverse
     *
     * @return mixed
     */
    public function purchase_request()
    {
        return $this->belongsTo(PurchaseRequest::class);
    }

    /**
     * One-to-Many: A purchase order may have one supplier.
     *
     * This function will retrieve the supplier of a purchase order.
     * See: Supplier's purchase_orders() method for the inverse
     *
     * @return mixed
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
