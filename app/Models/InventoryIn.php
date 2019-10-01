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
}
