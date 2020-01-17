<?php

namespace App\Policies;

use App\User;
use App\Models\ItemRequest;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemRequestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the item request.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ItemRequest  $itemRequest
     * @return mixed
     */
    public function view(User $user, ItemRequest $itemRequest)
    {
        //
    }

    /**
     * Determine whether the user can create item requests.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the item request.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ItemRequest  $itemRequest
     * @return mixed
     */
    public function update(User $user, ItemRequest $itemRequest)
    {
        //
    }

    /**
     * Determine whether the user can delete the item request.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ItemRequest  $itemRequest
     * @return mixed
     */
    public function delete(User $user, ItemRequest $itemRequest)
    {
        //
    }

    /**
     * Determine whether the user can restore the item request.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ItemRequest  $itemRequest
     * @return mixed
     */
    public function restore(User $user, ItemRequest $itemRequest)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the item request.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ItemRequest  $itemRequest
     * @return mixed
     */
    public function forceDelete(User $user, ItemRequest $itemRequest)
    {
        //
    }
}
