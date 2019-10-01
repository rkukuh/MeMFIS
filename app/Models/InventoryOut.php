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
}
