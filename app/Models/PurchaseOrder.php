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
        'shipping_address',
        'ship_at',
        'currency_id',
        'exchange_rate',
        'total_before_tax',
        'tax_amount',
        'total_after_tax',
        'top_type',
        'top_day_amount',
        'top_start_at',
        'description',
    ];

    protected $dates = [
        'ordered_at', 
        'valid_until', 
        'ship_at', 
        'top_start_at',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all Quotation's approvals.
     * See: Approvals's approvable() method for the inverse
     *
     * @return mixed
     */
    public function approvals()
    {
        return $this->morphMany(Approval::class, 'approvable');
    }

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
     * One-to-Many: A GRN may have one purchase order.
     *
     * This function will retrieve all the GRNs of a purchase order.
     * See: GoodsReceived's purchase_order() method for the inverse
     *
     * @return mixed
     */
    public function goods_receiveds()
    {
        return $this->hasMany(GoodsReceived::class);
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
                        'unit_id',
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
