<?php

namespace App\Models;

use App\MemfisModel;

class InventoryOut extends MemfisModel
{
    protected $table = 'inventory_out';

    protected $fillable = [
        'number',
        'storage_id',
        'inventoried_at',
        'inventoryoutable_type',
        'inventoryoutable_id',
        'description',
        'section',
    ];

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
     * Polymorphic: An entity can have zero or many InventoryIns.
     *
     * This function will get all of the owning inventoryoutable models.
     * See:
     * - ???
     *
     * @return mixed
     */
    public function inventoryoutable()
    {
        return $this->morphTo();
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
     * One-to-Many: An Inventory Out may have one storage.
     *
     * This function will retrieve all the GRNs of a storage.
     * See: Storage's inventory_outs() method for the inverse
     *
     * @return mixed
     */
    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }

    /**
     * Many-to-Many: An InventoryOut may have one or many item.
     *
     * This function will retrieve all the items of an InventoryOut.
     * See: Item's inventory_outs() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'inventoryout_item', 'inventoryout_id', 'item_id')
                    ->withPivot(
                        'serial_number',
                        'quantity',
                        'quantity_in_primary_unit',
                        'unit_id',
                        'purchased_price',
                        'total',
                        'description',
                        'expired_at'
                    )
                    ->withTimestamps();
    }
}
