<?php

namespace App\Policies;

use App\User;
use App\Models\Access;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccessPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the access.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Access  $access
     * @return mixed
     */
    public function view(User $user, Access $access)
    {
        //
    }

    /**
     * Determine whether the user can create accesses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the access.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Access  $access
     * @return mixed
     */
    public function update(User $user, Access $access)
    {
        //
    }

    /**
     * Determine whether the user can delete the access.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Access  $access
     * @return mixed
     */
    public function delete(User $user, Access $access)
    {
        //
    }

    /**
     * Determine whether the user can restore the access.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Access  $access
     * @return mixed
     */
    public function restore(User $user, Access $access)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the access.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Access  $access
     * @return mixed
     */
    public function forceDelete(User $user, Access $access)
    {
        //
    }
}
