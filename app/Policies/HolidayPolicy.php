<?php

namespace App\Policies;

use App\User;
use App\Models\Holiday;
use Illuminate\Auth\Access\HandlesAuthorization;

class HolidayPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the holiday.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Holiday  $holiday
     * @return mixed
     */
    public function view(User $user, Holiday $holiday)
    {
        //
    }

    /**
     * Determine whether the user can create holidays.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the holiday.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Holiday  $holiday
     * @return mixed
     */
    public function update(User $user, Holiday $holiday)
    {
        //
    }

    /**
     * Determine whether the user can delete the holiday.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Holiday  $holiday
     * @return mixed
     */
    public function delete(User $user, Holiday $holiday)
    {
        //
    }

    /**
     * Determine whether the user can restore the holiday.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Holiday  $holiday
     * @return mixed
     */
    public function restore(User $user, Holiday $holiday)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the holiday.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Holiday  $holiday
     * @return mixed
     */
    public function forceDelete(User $user, Holiday $holiday)
    {
        //
    }
}
