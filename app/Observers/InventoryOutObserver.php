<?php

namespace App\Observers;

use App\Models\InventoryOut;

class InventoryOutObserver
{
    /**
     * Handle the inventory out "created" event.
     *
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return void
     */
    public function created(InventoryOut $inventoryOut)
    {
        //
    }

    /**
     * Handle the inventory out "updated" event.
     *
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return void
     */
    public function updated(InventoryOut $inventoryOut)
    {
        // rollback
    }

    /**
     * Handle the inventory out "deleted" event.
     *
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return void
     */
    public function deleted(InventoryOut $inventoryOut)
    {
        //
    }

    /**
     * Handle the inventory out "restored" event.
     *
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return void
     */
    public function restored(InventoryOut $inventoryOut)
    {
        //
    }

    /**
     * Handle the inventory out "force deleted" event.
     *
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return void
     */
    public function forceDeleted(InventoryOut $inventoryOut)
    {
        //
    }
}
