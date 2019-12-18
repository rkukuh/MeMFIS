<?php

namespace App\Policies;

use App\User;
use App\Models\PurchaseRequestItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class PurchaseRequestItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the purchase request item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseRequestItem  $purchaseRequestItem
     * @return mixed
     */
    public function view(User $user, PurchaseRequestItem $purchaseRequestItem)
    {
        //
    }

    /**
     * Determine whether the user can create purchase request items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the purchase request item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseRequestItem  $purchaseRequestItem
     * @return mixed
     */
    public function update(User $user, PurchaseRequestItem $purchaseRequestItem)
    {
        //
    }

    /**
     * Determine whether the user can delete the purchase request item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseRequestItem  $purchaseRequestItem
     * @return mixed
     */
    public function delete(User $user, PurchaseRequestItem $purchaseRequestItem)
    {
        //
    }

    /**
     * Determine whether the user can restore the purchase request item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseRequestItem  $purchaseRequestItem
     * @return mixed
     */
    public function restore(User $user, PurchaseRequestItem $purchaseRequestItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the purchase request item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseRequestItem  $purchaseRequestItem
     * @return mixed
     */
    public function forceDelete(User $user, PurchaseRequestItem $purchaseRequestItem)
    {
        //
    }
}
