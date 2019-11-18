<?php

namespace App\Policies;

use App\User;
use App\Models\leave;
use Illuminate\Auth\Access\HandlesAuthorization;

class leavePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the leave.
     *
     * @param  \App\User  $user
     * @param  \App\Models\leave  $leave
     * @return mixed
     */
    public function view(User $user, leave $leave)
    {
        //
    }

    /**
     * Determine whether the user can create leaves.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the leave.
     *
     * @param  \App\User  $user
     * @param  \App\Models\leave  $leave
     * @return mixed
     */
    public function update(User $user, leave $leave)
    {
        //
    }

    /**
     * Determine whether the user can delete the leave.
     *
     * @param  \App\User  $user
     * @param  \App\Models\leave  $leave
     * @return mixed
     */
    public function delete(User $user, leave $leave)
    {
        //
    }

    /**
     * Determine whether the user can restore the leave.
     *
     * @param  \App\User  $user
     * @param  \App\Models\leave  $leave
     * @return mixed
     */
    public function restore(User $user, leave $leave)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the leave.
     *
     * @param  \App\User  $user
     * @param  \App\Models\leave  $leave
     * @return mixed
     */
    public function forceDelete(User $user, leave $leave)
    {
        //
    }
}
