<?php

namespace App\Models;

use App\MemfisModel;
use Directoryxx\Finac\Model\Coa;

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
        'expired_at',
    ];

    protected $dates = ['received_at','expired_at'];

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
     * M-M Polymorphic: A branch can be applied to many entities.
     *
     * This function will get all the branches that are applied to a given InventoryIn.
     * See: Branch's inventory_ins() method for the inverse
     *
     * @return mixed
     */
    public function branches()
    {
        return $this->morphToMany(Branch::class, 'branchable');
    }

    /**
     * Polymorphic: An entity can have zero or many coa.
     *
     * This function will get all good received's coa.
     * See: Coa's coa() method for the inverse
     *
     * @return mixed
     */
    public function coa()
    {
        return $this->morphToMany(Coa::class, 'coable');
    }

    /**
     * Polymorphic: An entity can have zero or one goods received.
     *
     * This function will get all TaskCard's quotations.
     * See: Inventory's goods_received() method for the inverse
     *
     * @return mixed
     */
    public function inventoryIn()
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
                        'serial_number',
                        'quantity',
                        'quantity_unit',
                        'unit_id',
                        'price',
                        'already_received_amount',
                        'note',
                        'expired_at'
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
