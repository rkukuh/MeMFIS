<?php

namespace App\Policies;

use App\User;
use App\Models\InventoryOut;
use Illuminate\Auth\Access\HandlesAuthorization;

class InventoryOutPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the inventory out.
     *
     * @param  \App\User  $user
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return mixed
     */
    public function view(User $user, InventoryOut $inventoryOut)
    {
        //
    }

    /**
     * Determine whether the user can create inventory outs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the inventory out.
     *
     * @param  \App\User  $user
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return mixed
     */
    public function update(User $user, InventoryOut $inventoryOut)
    {
        //
    }

    /**
     * Determine whether the user can delete the inventory out.
     *
     * @param  \App\User  $user
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return mixed
     */
    public function delete(User $user, InventoryOut $inventoryOut)
    {
        //
    }

    /**
     * Determine whether the user can restore the inventory out.
     *
     * @param  \App\User  $user
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return mixed
     */
    public function restore(User $user, InventoryOut $inventoryOut)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the inventory out.
     *
     * @param  \App\User  $user
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return mixed
     */
    public function forceDelete(User $user, InventoryOut $inventoryOut)
    {
        //
    }
}
