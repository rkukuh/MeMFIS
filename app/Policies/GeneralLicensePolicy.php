<?php

namespace App\Policies;

use App\User;
use App\Models\Pivots\GeneralLicense;
use Illuminate\Auth\Access\HandlesAuthorization;

class GeneralLicensePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the general license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\GeneralLicense  $generalLicense
     * @return mixed
     */
    public function view(User $user, GeneralLicense $generalLicense)
    {
        //
    }

    /**
     * Determine whether the user can create general licenses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the general license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\GeneralLicense  $generalLicense
     * @return mixed
     */
    public function update(User $user, GeneralLicense $generalLicense)
    {
        //
    }

    /**
     * Determine whether the user can delete the general license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\GeneralLicense  $generalLicense
     * @return mixed
     */
    public function delete(User $user, GeneralLicense $generalLicense)
    {
        //
    }

    /**
     * Determine whether the user can restore the general license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\GeneralLicense  $generalLicense
     * @return mixed
     */
    public function restore(User $user, GeneralLicense $generalLicense)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the general license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\GeneralLicense  $generalLicense
     * @return mixed
     */
    public function forceDelete(User $user, GeneralLicense $generalLicense)
    {
        //
    }
}
