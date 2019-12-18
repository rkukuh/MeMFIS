<?php

namespace App\Policies;

use App\User;
use App\Models\Religion;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReligionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the religion.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Religion  $religion
     * @return mixed
     */
    public function view(User $user, Religion $religion)
    {
        //
    }

    /**
     * Determine whether the user can create religions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the religion.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Religion  $religion
     * @return mixed
     */
    public function update(User $user, Religion $religion)
    {
        //
    }

    /**
     * Determine whether the user can delete the religion.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Religion  $religion
     * @return mixed
     */
    public function delete(User $user, Religion $religion)
    {
        //
    }

    /**
     * Determine whether the user can restore the religion.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Religion  $religion
     * @return mixed
     */
    public function restore(User $user, Religion $religion)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the religion.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Religion  $religion
     * @return mixed
     */
    public function forceDelete(User $user, Religion $religion)
    {
        //
    }
}
