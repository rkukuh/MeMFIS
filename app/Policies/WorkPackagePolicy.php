<?php

namespace App\Policies;

use App\User;
use App\Models\WorkPackage;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkPackagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the work package.
     *
     * @param  \App\User  $user
     * @param  \App\Models\WorkPackage  $workPackage
     * @return mixed
     */
    public function view(User $user, WorkPackage $workPackage)
    {
        //
    }

    /**
     * Determine whether the user can create work packages.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the work package.
     *
     * @param  \App\User  $user
     * @param  \App\Models\WorkPackage  $workPackage
     * @return mixed
     */
    public function update(User $user, WorkPackage $workPackage)
    {
        //
    }

    /**
     * Determine whether the user can delete the work package.
     *
     * @param  \App\User  $user
     * @param  \App\Models\WorkPackage  $workPackage
     * @return mixed
     */
    public function delete(User $user, WorkPackage $workPackage)
    {
        //
    }

    /**
     * Determine whether the user can restore the work package.
     *
     * @param  \App\User  $user
     * @param  \App\Models\WorkPackage  $workPackage
     * @return mixed
     */
    public function restore(User $user, WorkPackage $workPackage)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the work package.
     *
     * @param  \App\User  $user
     * @param  \App\Models\WorkPackage  $workPackage
     * @return mixed
     */
    public function forceDelete(User $user, WorkPackage $workPackage)
    {
        //
    }
}
