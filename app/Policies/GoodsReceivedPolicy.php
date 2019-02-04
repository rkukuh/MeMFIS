<?php

namespace App\Policies;

use App\User;
use App\Models\GoodsReceived;
use Illuminate\Auth\Access\HandlesAuthorization;

class GoodsReceivedPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the goods received.
     *
     * @param  \App\User  $user
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return mixed
     */
    public function view(User $user, GoodsReceived $goodsReceived)
    {
        //
    }

    /**
     * Determine whether the user can create goods receiveds.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the goods received.
     *
     * @param  \App\User  $user
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return mixed
     */
    public function update(User $user, GoodsReceived $goodsReceived)
    {
        //
    }

    /**
     * Determine whether the user can delete the goods received.
     *
     * @param  \App\User  $user
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return mixed
     */
    public function delete(User $user, GoodsReceived $goodsReceived)
    {
        //
    }

    /**
     * Determine whether the user can restore the goods received.
     *
     * @param  \App\User  $user
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return mixed
     */
    public function restore(User $user, GoodsReceived $goodsReceived)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the goods received.
     *
     * @param  \App\User  $user
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return mixed
     */
    public function forceDelete(User $user, GoodsReceived $goodsReceived)
    {
        //
    }
}
