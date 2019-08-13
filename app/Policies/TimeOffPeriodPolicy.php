<?php

namespace App\Policies;

use App\User;
use App\Models\TimeOffPeriod;
use Illuminate\Auth\Access\HandlesAuthorization;

class TimeOffPeriodPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the time off period.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TimeOffPeriod  $timeOffPeriod
     * @return mixed
     */
    public function view(User $user, TimeOffPeriod $timeOffPeriod)
    {
        //
    }

    /**
     * Determine whether the user can create time off periods.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the time off period.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TimeOffPeriod  $timeOffPeriod
     * @return mixed
     */
    public function update(User $user, TimeOffPeriod $timeOffPeriod)
    {
        //
    }

    /**
     * Determine whether the user can delete the time off period.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TimeOffPeriod  $timeOffPeriod
     * @return mixed
     */
    public function delete(User $user, TimeOffPeriod $timeOffPeriod)
    {
        //
    }

    /**
     * Determine whether the user can restore the time off period.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TimeOffPeriod  $timeOffPeriod
     * @return mixed
     */
    public function restore(User $user, TimeOffPeriod $timeOffPeriod)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the time off period.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TimeOffPeriod  $timeOffPeriod
     * @return mixed
     */
    public function forceDelete(User $user, TimeOffPeriod $timeOffPeriod)
    {
        //
    }
}
