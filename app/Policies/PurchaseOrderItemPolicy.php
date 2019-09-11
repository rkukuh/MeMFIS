<?php

namespace App\Policies;

use App\User;
use App\Models\PurchaseOrderItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class PurchaseOrderItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the purchase order item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseOrderItem  $purchaseOrderItem
     * @return mixed
     */
    public function view(User $user, PurchaseOrderItem $purchaseOrderItem)
    {
        //
    }

    /**
     * Determine whether the user can create purchase order items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the purchase order item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseOrderItem  $purchaseOrderItem
     * @return mixed
     */
    public function update(User $user, PurchaseOrderItem $purchaseOrderItem)
    {
        //
    }

    /**
     * Determine whether the user can delete the purchase order item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseOrderItem  $purchaseOrderItem
     * @return mixed
     */
    public function delete(User $user, PurchaseOrderItem $purchaseOrderItem)
    {
        //
    }

    /**
     * Determine whether the user can restore the purchase order item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseOrderItem  $purchaseOrderItem
     * @return mixed
     */
    public function restore(User $user, PurchaseOrderItem $purchaseOrderItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the purchase order item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseOrderItem  $purchaseOrderItem
     * @return mixed
     */
    public function forceDelete(User $user, PurchaseOrderItem $purchaseOrderItem)
    {
        //
    }
}
