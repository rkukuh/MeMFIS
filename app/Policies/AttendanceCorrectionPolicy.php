<?php

namespace App\Policies;

use App\User;
use App\Models\AttendanceCorrection;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttendanceCorrectionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the attendance correction.
     *
     * @param  \App\User  $user
     * @param  \App\Models\AttendanceCorrection  $attendanceCorrection
     * @return mixed
     */
    public function view(User $user, AttendanceCorrection $attendanceCorrection)
    {
        //
    }

    /**
     * Determine whether the user can create attendance corrections.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the attendance correction.
     *
     * @param  \App\User  $user
     * @param  \App\Models\AttendanceCorrection  $attendanceCorrection
     * @return mixed
     */
    public function update(User $user, AttendanceCorrection $attendanceCorrection)
    {
        //
    }

    /**
     * Determine whether the user can delete the attendance correction.
     *
     * @param  \App\User  $user
     * @param  \App\Models\AttendanceCorrection  $attendanceCorrection
     * @return mixed
     */
    public function delete(User $user, AttendanceCorrection $attendanceCorrection)
    {
        //
    }

    /**
     * Determine whether the user can restore the attendance correction.
     *
     * @param  \App\User  $user
     * @param  \App\Models\AttendanceCorrection  $attendanceCorrection
     * @return mixed
     */
    public function restore(User $user, AttendanceCorrection $attendanceCorrection)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the attendance correction.
     *
     * @param  \App\User  $user
     * @param  \App\Models\AttendanceCorrection  $attendanceCorrection
     * @return mixed
     */
    public function forceDelete(User $user, AttendanceCorrection $attendanceCorrection)
    {
        //
    }
}
