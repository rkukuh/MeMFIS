<?php

namespace App\Policies;

use App\User;
use App\Models\PurchaseRequest;
use Illuminate\Auth\Access\HandlesAuthorization;

class PurchaseRequestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the purchase request.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return mixed
     */
    public function view(User $user, PurchaseRequest $purchaseRequest)
    {
        //
    }

    /**
     * Determine whether the user can create purchase requests.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the purchase request.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return mixed
     */
    public function update(User $user, PurchaseRequest $purchaseRequest)
    {
        //
    }

    /**
     * Determine whether the user can delete the purchase request.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return mixed
     */
    public function delete(User $user, PurchaseRequest $purchaseRequest)
    {
        //
    }

    /**
     * Determine whether the user can restore the purchase request.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return mixed
     */
    public function restore(User $user, PurchaseRequest $purchaseRequest)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the purchase request.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return mixed
     */
    public function forceDelete(User $user, PurchaseRequest $purchaseRequest)
    {
        //
    }
}
