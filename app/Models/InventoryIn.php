<?php

namespace App\Models;

use App\MemfisModel;

class InventoryIn extends MemfisModel
{
    protected $table = 'inventory_in';

    protected $fillable = [
        'number',
        'branch_id',
        'storage_id',
        'inventoried_at',
        'inventoryinable_type',
        'inventoryinable_id',
        'description',
    ];

    protected $dates = ['inventoried_at'];

    /*************************************** RELATIONSHIP ****************************************/

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
                        'quantity',
                        'note'
                    )
                    ->withTimestamps();
    }
}
