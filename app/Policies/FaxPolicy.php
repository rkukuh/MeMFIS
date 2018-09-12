<?php

namespace App\Policies;

use App\User;
use App\Models\Fax;
use Illuminate\Auth\Access\HandlesAuthorization;

class FaxPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the fax.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Fax  $fax
     * @return mixed
     */
    public function view(User $user, Fax $fax)
    {
        //
    }

    /**
     * Determine whether the user can create faxes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the fax.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Fax  $fax
     * @return mixed
     */
    public function update(User $user, Fax $fax)
    {
        //
    }

    /**
     * Determine whether the user can delete the fax.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Fax  $fax
     * @return mixed
     */
    public function delete(User $user, Fax $fax)
    {
        //
    }

    /**
     * Determine whether the user can restore the fax.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Fax  $fax
     * @return mixed
     */
    public function restore(User $user, Fax $fax)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the fax.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Fax  $fax
     * @return mixed
     */
    public function forceDelete(User $user, Fax $fax)
    {
        //
    }
}
