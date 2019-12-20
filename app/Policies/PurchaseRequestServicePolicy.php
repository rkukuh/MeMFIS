<?php

namespace App\Policies;

use App\User;
use App\Models\PurchaseRequestService;
use Illuminate\Auth\Access\HandlesAuthorization;

class PurchaseRequestServicePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the purchase request service.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseRequestService  $purchaseRequestService
     * @return mixed
     */
    public function view(User $user, PurchaseRequestService $purchaseRequestService)
    {
        //
    }

    /**
     * Determine whether the user can create purchase request services.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the purchase request service.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseRequestService  $purchaseRequestService
     * @return mixed
     */
    public function update(User $user, PurchaseRequestService $purchaseRequestService)
    {
        //
    }

    /**
     * Determine whether the user can delete the purchase request service.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseRequestService  $purchaseRequestService
     * @return mixed
     */
    public function delete(User $user, PurchaseRequestService $purchaseRequestService)
    {
        //
    }

    /**
     * Determine whether the user can restore the purchase request service.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseRequestService  $purchaseRequestService
     * @return mixed
     */
    public function restore(User $user, PurchaseRequestService $purchaseRequestService)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the purchase request service.
     *
     * @param  \App\User  $user
     * @param  \App\Models\PurchaseRequestService  $purchaseRequestService
     * @return mixed
     */
    public function forceDelete(User $user, PurchaseRequestService $purchaseRequestService)
    {
        //
    }
}
