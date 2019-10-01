<?php

namespace App\Policies;

use App\User;
use App\Models\FefoOut;
use Illuminate\Auth\Access\HandlesAuthorization;

class FefoOutPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the fefo out.
     *
     * @param  \App\User  $user
     * @param  \App\Models\FefoOut  $fefoOut
     * @return mixed
     */
    public function view(User $user, FefoOut $fefoOut)
    {
        //
    }

    /**
     * Determine whether the user can create fefo outs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the fefo out.
     *
     * @param  \App\User  $user
     * @param  \App\Models\FefoOut  $fefoOut
     * @return mixed
     */
    public function update(User $user, FefoOut $fefoOut)
    {
        //
    }

    /**
     * Determine whether the user can delete the fefo out.
     *
     * @param  \App\User  $user
     * @param  \App\Models\FefoOut  $fefoOut
     * @return mixed
     */
    public function delete(User $user, FefoOut $fefoOut)
    {
        //
    }

    /**
     * Determine whether the user can restore the fefo out.
     *
     * @param  \App\User  $user
     * @param  \App\Models\FefoOut  $fefoOut
     * @return mixed
     */
    public function restore(User $user, FefoOut $fefoOut)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the fefo out.
     *
     * @param  \App\User  $user
     * @param  \App\Models\FefoOut  $fefoOut
     * @return mixed
     */
    public function forceDelete(User $user, FefoOut $fefoOut)
    {
        //
    }
}
