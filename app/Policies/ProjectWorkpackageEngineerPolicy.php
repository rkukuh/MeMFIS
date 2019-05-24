<?php

namespace App\Policies;

use App\User;
use App\Models\ProjectWorkPackageEngineer;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectWorkPackageEngineerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the project workpackage engineer.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageEngineer  $projectWorkPackageEngineer
     * @return mixed
     */
    public function view(User $user, ProjectWorkPackageEngineer $projectWorkPackageEngineer)
    {
        //
    }

    /**
     * Determine whether the user can create project workpackage engineers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the project workpackage engineer.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageEngineer  $projectWorkPackageEngineer
     * @return mixed
     */
    public function update(User $user, ProjectWorkPackageEngineer $projectWorkPackageEngineer)
    {
        //
    }

    /**
     * Determine whether the user can delete the project workpackage engineer.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageEngineer  $projectWorkPackageEngineer
     * @return mixed
     */
    public function delete(User $user, ProjectWorkPackageEngineer $projectWorkPackageEngineer)
    {
        //
    }

    /**
     * Determine whether the user can restore the project workpackage engineer.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageEngineer  $projectWorkPackageEngineer
     * @return mixed
     */
    public function restore(User $user, ProjectWorkPackageEngineer $projectWorkPackageEngineer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the project workpackage engineer.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageEngineer  $projectWorkPackageEngineer
     * @return mixed
     */
    public function forceDelete(User $user, ProjectWorkPackageEngineer $projectWorkPackageEngineer)
    {
        //
    }
}
