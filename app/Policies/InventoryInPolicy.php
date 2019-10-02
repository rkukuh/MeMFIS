<?php

namespace App\Policies;

use App\User;
use App\Models\InventoryIn;
use Illuminate\Auth\Access\HandlesAuthorization;

class InventoryInPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the inventory in.
     *
     * @param  \App\User  $user
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return mixed
     */
    public function view(User $user, InventoryIn $inventoryIn)
    {
        //
    }

    /**
     * Determine whether the user can create inventory ins.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the inventory in.
     *
     * @param  \App\User  $user
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return mixed
     */
    public function update(User $user, InventoryIn $inventoryIn)
    {
        //
    }

    /**
     * Determine whether the user can delete the inventory in.
     *
     * @param  \App\User  $user
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return mixed
     */
    public function delete(User $user, InventoryIn $inventoryIn)
    {
        //
    }

    /**
     * Determine whether the user can restore the inventory in.
     *
     * @param  \App\User  $user
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return mixed
     */
    public function restore(User $user, InventoryIn $inventoryIn)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the inventory in.
     *
     * @param  \App\User  $user
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return mixed
     */
    public function forceDelete(User $user, InventoryIn $inventoryIn)
    {
        //
    }
}
