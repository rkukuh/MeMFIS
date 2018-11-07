<?php

namespace App\Policies;

use App\User;
use App\Models\CertificationEmployee;
use Illuminate\Auth\Access\HandlesAuthorization;

class CertificationEmployeePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the certification employee.
     *
     * @param  \App\User  $user
     * @param  \App\Models\CertificationEmployee  $certificationEmployee
     * @return mixed
     */
    public function view(User $user, CertificationEmployee $certificationEmployee)
    {
        //
    }

    /**
     * Determine whether the user can create certification employees.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the certification employee.
     *
     * @param  \App\User  $user
     * @param  \App\Models\CertificationEmployee  $certificationEmployee
     * @return mixed
     */
    public function update(User $user, CertificationEmployee $certificationEmployee)
    {
        //
    }

    /**
     * Determine whether the user can delete the certification employee.
     *
     * @param  \App\User  $user
     * @param  \App\Models\CertificationEmployee  $certificationEmployee
     * @return mixed
     */
    public function delete(User $user, CertificationEmployee $certificationEmployee)
    {
        //
    }

    /**
     * Determine whether the user can restore the certification employee.
     *
     * @param  \App\User  $user
     * @param  \App\Models\CertificationEmployee  $certificationEmployee
     * @return mixed
     */
    public function restore(User $user, CertificationEmployee $certificationEmployee)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the certification employee.
     *
     * @param  \App\User  $user
     * @param  \App\Models\CertificationEmployee  $certificationEmployee
     * @return mixed
     */
    public function forceDelete(User $user, CertificationEmployee $certificationEmployee)
    {
        //
    }
}
