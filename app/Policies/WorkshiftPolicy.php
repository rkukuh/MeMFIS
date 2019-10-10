<?php

namespace App\Policies;

use App\User;
use App\Models\Workshift;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkshiftPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the workshift.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Workshift  $workshift
     * @return mixed
     */
    public function view(User $user, Workshift $workshift)
    {
        //
    }

    /**
     * Determine whether the user can create workshifts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the workshift.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Workshift  $workshift
     * @return mixed
     */
    public function update(User $user, Workshift $workshift)
    {
        //
    }

    /**
     * Determine whether the user can delete the workshift.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Workshift  $workshift
     * @return mixed
     */
    public function delete(User $user, Workshift $workshift)
    {
        //
    }

    /**
     * Determine whether the user can restore the workshift.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Workshift  $workshift
     * @return mixed
     */
    public function restore(User $user, Workshift $workshift)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the workshift.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Workshift  $workshift
     * @return mixed
     */
    public function forceDelete(User $user, Workshift $workshift)
    {
        //
    }
}
