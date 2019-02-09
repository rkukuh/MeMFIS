<?php

namespace App\Models;

use App\MemfisModel;

class PurchaseOrder extends MemfisModel
{
    protected $fillable = [
        'number',
        'vendor_id',
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
     * Many-to-Many: A purchase order may have zero or many item.
     *
     * This function will retrieve all the items of a purchase order.
     * See: Item's purchase_orders() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->belongsToMany(Item::class)
                    ->withPivot(
                        'quantity',
                        'price',
                        'subtotal_before_discount',
                        'discount_percentage',
                        'discount_amount',
                        'subtotal_after_discount',
                        'note'
                    )
                    ->withTimestamps();
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
     * One-to-Many: A purchase order may have one vendor.
     *
     * This function will retrieve the vendor of a purchase order.
     * See: Vendor's purchase_orders() method for the inverse
     *
     * @return mixed
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
