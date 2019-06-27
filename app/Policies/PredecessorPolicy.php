<?php

namespace App\Policies;

use App\User;
use App\Models\Predecessor;
use Illuminate\Auth\Access\HandlesAuthorization;

class PredecessorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the predecessor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Predecessor  $predecessor
     * @return mixed
     */
    public function view(User $user, Predecessor $predecessor)
    {
        //
    }

    /**
     * Determine whether the user can create predecessors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the predecessor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Predecessor  $predecessor
     * @return mixed
     */
    public function update(User $user, Predecessor $predecessor)
    {
        //
    }

    /**
     * Determine whether the user can delete the predecessor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Predecessor  $predecessor
     * @return mixed
     */
    public function delete(User $user, Predecessor $predecessor)
    {
        //
    }

    /**
     * Determine whether the user can restore the predecessor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Predecessor  $predecessor
     * @return mixed
     */
    public function restore(User $user, Predecessor $predecessor)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the predecessor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Predecessor  $predecessor
     * @return mixed
     */
    public function forceDelete(User $user, Predecessor $predecessor)
    {
        //
    }
}
