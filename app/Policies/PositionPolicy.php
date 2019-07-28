<?php

namespace App\Policies;

use App\User;
use App\Models\Position;
use Illuminate\Auth\Access\HandlesAuthorization;

class PositionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the position.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Position  $position
     * @return mixed
     */
    public function view(User $user, Position $position)
    {
        //
    }

    /**
     * Determine whether the user can create positions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the position.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Position  $position
     * @return mixed
     */
    public function update(User $user, Position $position)
    {
        //
    }

    /**
     * Determine whether the user can delete the position.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Position  $position
     * @return mixed
     */
    public function delete(User $user, Position $position)
    {
        //
    }

    /**
     * Determine whether the user can restore the position.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Position  $position
     * @return mixed
     */
    public function restore(User $user, Position $position)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the position.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Position  $position
     * @return mixed
     */
    public function forceDelete(User $user, Position $position)
    {
        //
    }
}
