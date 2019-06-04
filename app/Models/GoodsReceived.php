<?php

namespace App\Models;

use App\MemfisModel;

class GoodsReceived extends MemfisModel
{
    protected $table = 'goods_received';

    protected $fillable = [
        'number',
        'received_by',
        'received_at',
        'vehicle_no',
        'container_no',
        'purchase_order_id',
        'storage_id',
        'approved_by',
        'approved_at',
        'description',
    ];

    protected $dates = [
        'received_at', 
        'approved_at'
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A GRN may have one approver.
     *
     * This function will retrieve the approver of a GRN.
     * See: Employee's grn_approved() method for the inverse
     *
     * @return mixed
     */
    public function approvedBy()
    {
        return $this->belongsTo(Employee::class, 'approved_by');
    }

    /**
     * Many-to-Many: A GRN may have zero or many item.
     *
     * This function will retrieve all the items of a GRN.
     * See: Item's goods_received() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->belongsToMany(Item::class)
                    ->withPivot(
                        'quantity',
                        'already_received',
                        'unit_id',
                        'note'
                    )
                    ->withTimestamps();
    }

    /**
     * One-to-Many: A GRN may have one employee (to receive the item).
     *
     * This function will retrieve the receiver of a GRN.
     * See: Employee's grn_received() method for the inverse
     *
     * @return mixed
     */
    public function receivedBy()
    {
        return $this->belongsTo(Employee::class, 'received_by');
    }

    /**
     * One-to-Many: A GRN may have one purchase order.
     *
     * This function will retrieve the purchase order of a GRN.
     * See: PurchaseOrder's goods_receiveds() method for the inverse
     *
     * @return mixed
     */
    public function purchase_order()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    /**
     * One-to-Many: A GRN may have one storage.
     *
     * This function will retrieve the storage of a GRN.
     * See: Storage's goods_receiveds() method for the inverse
     *
     * @return mixed
     */
    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }
}
