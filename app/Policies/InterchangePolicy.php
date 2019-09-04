<?php

namespace App\Policies;

use App\User;
use App\Models\Interchange;
use Illuminate\Auth\Access\HandlesAuthorization;

class InterchangePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the interchange.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Interchange  $interchange
     * @return mixed
     */
    public function view(User $user, Interchange $interchange)
    {
        //
    }

    /**
     * Determine whether the user can create interchanges.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the interchange.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Interchange  $interchange
     * @return mixed
     */
    public function update(User $user, Interchange $interchange)
    {
        //
    }

    /**
     * Determine whether the user can delete the interchange.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Interchange  $interchange
     * @return mixed
     */
    public function delete(User $user, Interchange $interchange)
    {
        //
    }

    /**
     * Determine whether the user can restore the interchange.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Interchange  $interchange
     * @return mixed
     */
    public function restore(User $user, Interchange $interchange)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the interchange.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Interchange  $interchange
     * @return mixed
     */
    public function forceDelete(User $user, Interchange $interchange)
    {
        //
    }
}
