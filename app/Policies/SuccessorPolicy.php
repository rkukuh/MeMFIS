<?php

namespace App\Policies;

use App\User;
use App\Models\Successor;
use Illuminate\Auth\Access\HandlesAuthorization;

class SuccessorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the successor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Successor  $successor
     * @return mixed
     */
    public function view(User $user, Successor $successor)
    {
        //
    }

    /**
     * Determine whether the user can create successors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the successor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Successor  $successor
     * @return mixed
     */
    public function update(User $user, Successor $successor)
    {
        //
    }

    /**
     * Determine whether the user can delete the successor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Successor  $successor
     * @return mixed
     */
    public function delete(User $user, Successor $successor)
    {
        //
    }

    /**
     * Determine whether the user can restore the successor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Successor  $successor
     * @return mixed
     */
    public function restore(User $user, Successor $successor)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the successor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Successor  $successor
     * @return mixed
     */
    public function forceDelete(User $user, Successor $successor)
    {
        //
    }
}
