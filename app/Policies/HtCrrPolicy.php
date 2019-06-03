<?php

namespace App\Policies;

use App\User;
use App\Models\HtCrr;
use Illuminate\Auth\Access\HandlesAuthorization;

class HtCrrPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the ht crr.
     *
     * @param  \App\User  $user
     * @param  \App\Models\HtCrr  $htCrr
     * @return mixed
     */
    public function view(User $user, HtCrr $htCrr)
    {
        //
    }

    /**
     * Determine whether the user can create ht crrs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the ht crr.
     *
     * @param  \App\User  $user
     * @param  \App\Models\HtCrr  $htCrr
     * @return mixed
     */
    public function update(User $user, HtCrr $htCrr)
    {
        //
    }

    /**
     * Determine whether the user can delete the ht crr.
     *
     * @param  \App\User  $user
     * @param  \App\Models\HtCrr  $htCrr
     * @return mixed
     */
    public function delete(User $user, HtCrr $htCrr)
    {
        //
    }

    /**
     * Determine whether the user can restore the ht crr.
     *
     * @param  \App\User  $user
     * @param  \App\Models\HtCrr  $htCrr
     * @return mixed
     */
    public function restore(User $user, HtCrr $htCrr)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the ht crr.
     *
     * @param  \App\User  $user
     * @param  \App\Models\HtCrr  $htCrr
     * @return mixed
     */
    public function forceDelete(User $user, HtCrr $htCrr)
    {
        //
    }
}
