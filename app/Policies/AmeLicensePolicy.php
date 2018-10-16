<?php

namespace App\Policies;

use App\User;
use App\Models\Pivots\AmeLicense;
use Illuminate\Auth\Access\HandlesAuthorization;

class AmeLicensePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the ame license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Pivots\AmeLicense  $ameLicense
     * @return mixed
     */
    public function view(User $user, AmeLicense $ameLicense)
    {
        //
    }

    /**
     * Determine whether the user can create ame licenses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the ame license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Pivots\AmeLicense  $ameLicense
     * @return mixed
     */
    public function update(User $user, AmeLicense $ameLicense)
    {
        //
    }

    /**
     * Determine whether the user can delete the ame license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Pivots\AmeLicense  $ameLicense
     * @return mixed
     */
    public function delete(User $user, AmeLicense $ameLicense)
    {
        //
    }

    /**
     * Determine whether the user can restore the ame license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Pivots\AmeLicense  $ameLicense
     * @return mixed
     */
    public function restore(User $user, AmeLicense $ameLicense)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the ame license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Pivots\AmeLicense  $ameLicense
     * @return mixed
     */
    public function forceDelete(User $user, AmeLicense $ameLicense)
    {
        //
    }
}
