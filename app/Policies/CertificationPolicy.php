<?php

namespace App\Policies;

use App\User;
use App\Models\Certification;
use Illuminate\Auth\Access\HandlesAuthorization;

class CertificationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the certification.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Certification  $certification
     * @return mixed
     */
    public function view(User $user, Certification $certification)
    {
        //
    }

    /**
     * Determine whether the user can create certifications.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the certification.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Certification  $certification
     * @return mixed
     */
    public function update(User $user, Certification $certification)
    {
        //
    }

    /**
     * Determine whether the user can delete the certification.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Certification  $certification
     * @return mixed
     */
    public function delete(User $user, Certification $certification)
    {
        //
    }

    /**
     * Determine whether the user can restore the certification.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Certification  $certification
     * @return mixed
     */
    public function restore(User $user, Certification $certification)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the certification.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Certification  $certification
     * @return mixed
     */
    public function forceDelete(User $user, Certification $certification)
    {
        //
    }
}
