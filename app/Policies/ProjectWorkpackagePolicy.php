<?php

namespace App\Policies;

use App\User;
use App\Models\ProjectWorkPackage;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectWorkPackagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the project workpackage.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackage  $projectWorkPackage
     * @return mixed
     */
    public function view(User $user, ProjectWorkPackage $projectWorkPackage)
    {
        //
    }

    /**
     * Determine whether the user can create project workpackages.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the project workpackage.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackage  $projectWorkPackage
     * @return mixed
     */
    public function update(User $user, ProjectWorkPackage $projectWorkPackage)
    {
        //
    }

    /**
     * Determine whether the user can delete the project workpackage.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackage  $projectWorkPackage
     * @return mixed
     */
    public function delete(User $user, ProjectWorkPackage $projectWorkPackage)
    {
        //
    }

    /**
     * Determine whether the user can restore the project workpackage.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackage  $projectWorkPackage
     * @return mixed
     */
    public function restore(User $user, ProjectWorkPackage $projectWorkPackage)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the project workpackage.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackage  $projectWorkPackage
     * @return mixed
     */
    public function forceDelete(User $user, ProjectWorkPackage $projectWorkPackage)
    {
        //
    }
}
