<?php

namespace App\Policies;

use App\User;
use App\Models\Repeat;
use Illuminate\Auth\Access\HandlesAuthorization;

class RepeatPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the repeat.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Repeat  $repeat
     * @return mixed
     */
    public function view(User $user, Repeat $repeat)
    {
        //
    }

    /**
     * Determine whether the user can create repeats.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the repeat.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Repeat  $repeat
     * @return mixed
     */
    public function update(User $user, Repeat $repeat)
    {
        //
    }

    /**
     * Determine whether the user can delete the repeat.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Repeat  $repeat
     * @return mixed
     */
    public function delete(User $user, Repeat $repeat)
    {
        //
    }

    /**
     * Determine whether the user can restore the repeat.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Repeat  $repeat
     * @return mixed
     */
    public function restore(User $user, Repeat $repeat)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the repeat.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Repeat  $repeat
     * @return mixed
     */
    public function forceDelete(User $user, Repeat $repeat)
    {
        //
    }
}
