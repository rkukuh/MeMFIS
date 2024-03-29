<?php

namespace App\Policies;

use App\User;
use App\Models\License;
use Illuminate\Auth\Access\HandlesAuthorization;

class LicensePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\License  $license
     * @return mixed
     */
    public function view(User $user, License $license)
    {
        //
    }

    /**
     * Determine whether the user can create licenses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\License  $license
     * @return mixed
     */
    public function update(User $user, License $license)
    {
        //
    }

    /**
     * Determine whether the user can delete the license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\License  $license
     * @return mixed
     */
    public function delete(User $user, License $license)
    {
        //
    }

    /**
     * Determine whether the user can restore the license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\License  $license
     * @return mixed
     */
    public function restore(User $user, License $license)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\License  $license
     * @return mixed
     */
    public function forceDelete(User $user, License $license)
    {
        //
    }
}
