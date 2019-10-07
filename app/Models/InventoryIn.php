<?php

namespace App\Models;

use App\MemfisModel;

class InventoryIn extends MemfisModel
{
    protected $table = 'inventory_in';

    protected $fillable = [
        'inventoryinable_type',
        'inventoryinable_id',
    ];

    /*************************************** RELATIONSHIP ****************************************/


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
        return $this->hasMany(FefoIn::class);
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
                        'quantity',
                        'note'
                    )
                    ->withTimestamps();
    }
}
