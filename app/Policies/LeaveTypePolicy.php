<?php

namespace App\Policies;

use App\User;
use App\Models\LeaveType;
use Illuminate\Auth\Access\HandlesAuthorization;

class LeaveTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the leave type.
     *
     * @param  \App\User  $user
     * @param  \App\Models\LeaveType  $leaveType
     * @return mixed
     */
    public function view(User $user, LeaveType $leaveType)
    {
        //
    }

    /**
     * Determine whether the user can create leave types.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the leave type.
     *
     * @param  \App\User  $user
     * @param  \App\Models\LeaveType  $leaveType
     * @return mixed
     */
    public function update(User $user, LeaveType $leaveType)
    {
        //
    }

    /**
     * Determine whether the user can delete the leave type.
     *
     * @param  \App\User  $user
     * @param  \App\Models\LeaveType  $leaveType
     * @return mixed
     */
    public function delete(User $user, LeaveType $leaveType)
    {
        //
    }

    /**
     * Determine whether the user can restore the leave type.
     *
     * @param  \App\User  $user
     * @param  \App\Models\LeaveType  $leaveType
     * @return mixed
     */
    public function restore(User $user, LeaveType $leaveType)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the leave type.
     *
     * @param  \App\User  $user
     * @param  \App\Models\LeaveType  $leaveType
     * @return mixed
     */
    public function forceDelete(User $user, LeaveType $leaveType)
    {
        //
    }
}
