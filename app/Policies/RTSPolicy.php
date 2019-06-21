<?php

namespace App\Policies;

use App\User;
use App\Models\RTS;
use Illuminate\Auth\Access\HandlesAuthorization;

class RTSPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the r t s.
     *
     * @param  \App\User  $user
     * @param  \App\Models\RTS  $rTS
     * @return mixed
     */
    public function view(User $user, RTS $rTS)
    {
        //
    }

    /**
     * Determine whether the user can create r t s s.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the r t s.
     *
     * @param  \App\User  $user
     * @param  \App\Models\RTS  $rTS
     * @return mixed
     */
    public function update(User $user, RTS $rTS)
    {
        //
    }

    /**
     * Determine whether the user can delete the r t s.
     *
     * @param  \App\User  $user
     * @param  \App\Models\RTS  $rTS
     * @return mixed
     */
    public function delete(User $user, RTS $rTS)
    {
        //
    }

    /**
     * Determine whether the user can restore the r t s.
     *
     * @param  \App\User  $user
     * @param  \App\Models\RTS  $rTS
     * @return mixed
     */
    public function restore(User $user, RTS $rTS)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the r t s.
     *
     * @param  \App\User  $user
     * @param  \App\Models\RTS  $rTS
     * @return mixed
     */
    public function forceDelete(User $user, RTS $rTS)
    {
        //
    }
}
