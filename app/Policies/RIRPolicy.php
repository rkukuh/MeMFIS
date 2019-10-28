<?php

namespace App\Policies;

use App\User;
use App\Models\RIR;
use Illuminate\Auth\Access\HandlesAuthorization;

class RIRPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the r i r.
     *
     * @param  \App\User  $user
     * @param  \App\Models\RIR  $rIR
     * @return mixed
     */
    public function view(User $user, RIR $rIR)
    {
        //
    }

    /**
     * Determine whether the user can create r i r s.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the r i r.
     *
     * @param  \App\User  $user
     * @param  \App\Models\RIR  $rIR
     * @return mixed
     */
    public function update(User $user, RIR $rIR)
    {
        //
    }

    /**
     * Determine whether the user can delete the r i r.
     *
     * @param  \App\User  $user
     * @param  \App\Models\RIR  $rIR
     * @return mixed
     */
    public function delete(User $user, RIR $rIR)
    {
        //
    }

    /**
     * Determine whether the user can restore the r i r.
     *
     * @param  \App\User  $user
     * @param  \App\Models\RIR  $rIR
     * @return mixed
     */
    public function restore(User $user, RIR $rIR)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the r i r.
     *
     * @param  \App\User  $user
     * @param  \App\Models\RIR  $rIR
     * @return mixed
     */
    public function forceDelete(User $user, RIR $rIR)
    {
        //
    }
}
