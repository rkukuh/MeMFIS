<?php

namespace App\Policies;

use App\User;
use App\Models\LeavePeriod;
use Illuminate\Auth\Access\HandlesAuthorization;

class LeavePeriodPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the leave period.
     *
     * @param  \App\User  $user
     * @param  \App\Models\LeavePeriod  $leavePeriod
     * @return mixed
     */
    public function view(User $user, LeavePeriod $leavePeriod)
    {
        //
    }

    /**
     * Determine whether the user can create leave periods.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the leave period.
     *
     * @param  \App\User  $user
     * @param  \App\Models\LeavePeriod  $leavePeriod
     * @return mixed
     */
    public function update(User $user, LeavePeriod $leavePeriod)
    {
        //
    }

    /**
     * Determine whether the user can delete the leave period.
     *
     * @param  \App\User  $user
     * @param  \App\Models\LeavePeriod  $leavePeriod
     * @return mixed
     */
    public function delete(User $user, LeavePeriod $leavePeriod)
    {
        //
    }

    /**
     * Determine whether the user can restore the leave period.
     *
     * @param  \App\User  $user
     * @param  \App\Models\LeavePeriod  $leavePeriod
     * @return mixed
     */
    public function restore(User $user, LeavePeriod $leavePeriod)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the leave period.
     *
     * @param  \App\User  $user
     * @param  \App\Models\LeavePeriod  $leavePeriod
     * @return mixed
     */
    public function forceDelete(User $user, LeavePeriod $leavePeriod)
    {
        //
    }
}
