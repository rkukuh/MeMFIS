<?php

namespace App\Policies;

use App\User;
use App\Models\FefoIn;
use Illuminate\Auth\Access\HandlesAuthorization;

class FefoInPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the fefo in.
     *
     * @param  \App\User  $user
     * @param  \App\Models\FefoIn  $fefoIn
     * @return mixed
     */
    public function view(User $user, FefoIn $fefoIn)
    {
        //
    }

    /**
     * Determine whether the user can create fefo ins.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the fefo in.
     *
     * @param  \App\User  $user
     * @param  \App\Models\FefoIn  $fefoIn
     * @return mixed
     */
    public function update(User $user, FefoIn $fefoIn)
    {
        //
    }

    /**
     * Determine whether the user can delete the fefo in.
     *
     * @param  \App\User  $user
     * @param  \App\Models\FefoIn  $fefoIn
     * @return mixed
     */
    public function delete(User $user, FefoIn $fefoIn)
    {
        //
    }

    /**
     * Determine whether the user can restore the fefo in.
     *
     * @param  \App\User  $user
     * @param  \App\Models\FefoIn  $fefoIn
     * @return mixed
     */
    public function restore(User $user, FefoIn $fefoIn)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the fefo in.
     *
     * @param  \App\User  $user
     * @param  \App\Models\FefoIn  $fefoIn
     * @return mixed
     */
    public function forceDelete(User $user, FefoIn $fefoIn)
    {
        //
    }
}
