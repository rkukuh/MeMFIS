<?php

namespace App\Models;

use App\MemfisModel;

class PurchaseOrder extends MemfisModel
{
    protected $fillable = [
        'number',
        'supplier_id',
        'purchase_request_id',
        'ordered_at',
        'valid_until',
        'ship_at',
        'currency_id',
        'exchange_rate',
        'total_before_tax',
        'tax_amount',
        'total_after_tax',
        'description',
    ];

    protected $dates = ['ordered_at', 'valid_until', 'ship_at'];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A purchase order may have one currency.
     *
     * This function will retrieve the currency of a purchase order.
     * See: Currency's purchase_orders() method for the inverse
     *
     * @return mixed
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * One-to-Many: A purchase order may have one purchase request.
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
