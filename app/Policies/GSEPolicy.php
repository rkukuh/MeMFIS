<?php

namespace App\Policies;

use App\User;
use App\Models\GSE;
use Illuminate\Auth\Access\HandlesAuthorization;

class GSEPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the g s e.
     *
     * @param  \App\User  $user
     * @param  \App\Models\GSE  $gSE
     * @return mixed
     */
    public function view(User $user, GSE $gSE)
    {
        //
    }

    /**
     * Determine whether the user can create g s e s.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the g s e.
     *
     * @param  \App\User  $user
     * @param  \App\Models\GSE  $gSE
     * @return mixed
     */
    public function update(User $user, GSE $gSE)
    {
        //
    }

    /**
     * Determine whether the user can delete the g s e.
     *
     * @param  \App\User  $user
     * @param  \App\Models\GSE  $gSE
     * @return mixed
     */
    public function delete(User $user, GSE $gSE)
    {
        //
    }

    /**
     * Determine whether the user can restore the g s e.
     *
     * @param  \App\User  $user
     * @param  \App\Models\GSE  $gSE
     * @return mixed
     */
    public function restore(User $user, GSE $gSE)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the g s e.
     *
     * @param  \App\User  $user
     * @param  \App\Models\GSE  $gSE
     * @return mixed
     */
    public function forceDelete(User $user, GSE $gSE)
    {
        //
    }
}
