<?php

namespace App\Policies;

use App\User;
use App\Models\Level;
use Illuminate\Auth\Access\HandlesAuthorization;

class LevelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the level.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Level  $level
     * @return mixed
     */
    public function view(User $user, Level $level)
    {
        //
    }

    /**
     * Determine whether the user can create levels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the level.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Level  $level
     * @return mixed
     */
    public function update(User $user, Level $level)
    {
        //
    }

    /**
     * Determine whether the user can delete the level.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Level  $level
     * @return mixed
     */
    public function delete(User $user, Level $level)
    {
        //
    }

    /**
     * Determine whether the user can restore the level.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Level  $level
     * @return mixed
     */
    public function restore(User $user, Level $level)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the level.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Level  $level
     * @return mixed
     */
    public function forceDelete(User $user, Level $level)
    {
        //
    }
}
