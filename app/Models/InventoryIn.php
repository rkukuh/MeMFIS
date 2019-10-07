<?php

namespace App\Models;

use App\MemfisModel;

class InventoryIn extends MemfisModel
{
    protected $table = 'inventory_in';

    protected $fillable = [
        'number',
        'storage_id',
        'inventoried_at',
        'inventoryinable_type',
        'inventoryinable_id',
        'description',
    ];

    protected $dates = ['inventoried_at'];

    /*************************************** RELATIONSHIP ****************************************/

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
     * One-to-Many: A fefo in must have an inventory in
     *
     * This function will retrieve all the fefo in of an inventory in.
     * See: Fefo In's inventoryIn() method for the inverse
     *
     * @return mixed
     */
    public function fefoIn()
    {
        return $this->hasMany(FefoIn::class, 'inventoryin_id');
    }

    /**
     * Polymorphic: An entity can have zero or many InventoryIns.
     *
     * This function will get all of the owning inventoryinable models.
     * See:
     * - ???
     *
     * @return mixed
     */
    public function inventoryinable()
    {
        return $this->morphTo();
    }

    /**
     * Many-to-Many: An InventoryIn may have one or many item.
     *
     * This function will retrieve all the items of an InventoryIn.
     * See: Item's inventory_ins() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'inventoryin_item', 'inventoryin_id', 'item_id')
                    ->withPivot(
                        'serial_number',
                        'quantity',
                        'quantity_in_primary_unit',
                        'unit_id',
                        'purchased_price',
                        'total',
                        'description'
                    )
                    ->withTimestamps();
    }
}
