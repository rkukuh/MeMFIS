<?php

namespace App\Models;

use App\MemfisModel;

class InventoryOut extends MemfisModel
{
    protected $table = 'inventory_out';

    protected $fillable = [
        'inventoryoutable_type',
        'inventoryoutable_id',
    ];

    /*************************************** RELATIONSHIP ****************************************/

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
                        'quantity',
                        'note'
                    )
                    ->withTimestamps();
    }
}
