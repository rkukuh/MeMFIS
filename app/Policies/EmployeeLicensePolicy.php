<?php

namespace App\Policies;

use App\User;
use App\Models\Pivots\EmployeeLicense;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeeLicensePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the employee license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Pivots\EmployeeLicense  $employeeLicense
     * @return mixed
     */
    public function view(User $user, EmployeeLicense $employeeLicense)
    {
        //
    }

    /**
     * Determine whether the user can create employee licenses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the employee license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Pivots\EmployeeLicense  $employeeLicense
     * @return mixed
     */
    public function update(User $user, EmployeeLicense $employeeLicense)
    {
        //
    }

    /**
     * Determine whether the user can delete the employee license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Pivots\EmployeeLicense  $employeeLicense
     * @return mixed
     */
    public function delete(User $user, EmployeeLicense $employeeLicense)
    {
        //
    }

    /**
     * Determine whether the user can restore the employee license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Pivots\EmployeeLicense  $employeeLicense
     * @return mixed
     */
    public function restore(User $user, EmployeeLicense $employeeLicense)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the employee license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Pivots\EmployeeLicense  $employeeLicense
     * @return mixed
     */
    public function forceDelete(User $user, EmployeeLicense $employeeLicense)
    {
        //
    }
}
