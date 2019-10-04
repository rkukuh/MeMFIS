<?php

namespace App\Models;

use App\MemfisModel;

class GoodsReceived extends MemfisModel
{
    protected $table = 'goods_received';

    protected $fillable = [
        'number',
        'purchase_order_id',
        'received_by',
        'received_at',
        'vehicle_no',
        'container_no',
        'storage_id',
        'description',
        'additionals',
        'origin_vendor_coa',
    ];

    protected $dates = ['received_at'];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all GoodsReceived's approvals.
     * See: Approvals's approvable() method for the inverse
     *
     * @return mixed
     */
    public function approvals()
    {
        return $this->morphMany(Approval::class, 'approvable');
    }

    /**
     * Polymorphic: An entity can have zero or one inventory in.
     *
     * This function will get all TaskCard's quotations.
     * See: Inventory's inventory() method for the inverse
     *
     * @return mixed
     */
    public function inventoryin()
    {
        return $this->morphOne(InventoryIn::class, 'inventoryinable');
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
                        'quantity_unit',
                        'unit_id',
                        'price',
                        'already_received_amount',
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
