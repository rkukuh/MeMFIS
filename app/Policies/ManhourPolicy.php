<?php

namespace App\Policies;

use App\User;
use App\Models\Manhour;
use Illuminate\Auth\Access\HandlesAuthorization;

class ManhourPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the manhour.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Manhour  $manhour
     * @return mixed
     */
    public function view(User $user, Manhour $manhour)
    {
        //
    }

    /**
     * Determine whether the user can create manhours.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the manhour.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Manhour  $manhour
     * @return mixed
     */
    public function update(User $user, Manhour $manhour)
    {
        //
    }

    /**
     * Determine whether the user can delete the manhour.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Manhour  $manhour
     * @return mixed
     */
    public function delete(User $user, Manhour $manhour)
    {
        //
    }

    /**
     * Determine whether the user can restore the manhour.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Manhour  $manhour
     * @return mixed
     */
    public function restore(User $user, Manhour $manhour)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the manhour.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Manhour  $manhour
     * @return mixed
     */
    public function forceDelete(User $user, Manhour $manhour)
    {
        //
    }
}
