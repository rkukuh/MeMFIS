<?php

namespace App\Observers;

use App\Models\InventoryIn;

class InventoryInObserver
{
    /**
     * Handle the inventory in "created" event.
     *
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return void
     */
    public function created(InventoryIn $inventoryIn)
    {
        $inventoryIn->branches()->attach(1);
    }

    /**
     * Handle the inventory in "updated" event.
     *
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return void
     */
    public function updated(InventoryIn $inventoryIn)
    {
        //
    }

    /**
     * Handle the inventory in "deleted" event.
     *
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return void
     */
    public function deleted(InventoryIn $inventoryIn)
    {
        // rollback
    }

    /**
     * Handle the inventory in "restored" event.
     *
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return void
     */
    public function restored(InventoryIn $inventoryIn)
    {
        //
    }

    /**
     * Handle the inventory in "force deleted" event.
     *
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return void
     */
    public function forceDeleted(InventoryIn $inventoryIn)
    {
        //
    }
}
