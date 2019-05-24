<?php

namespace App\Policies;

use App\User;
use App\Models\ProjectWorkPackageManhour;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectWorkPackageManhourPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the project work package manhour.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageManhour  $projectWorkPackageManhour
     * @return mixed
     */
    public function view(User $user, ProjectWorkPackageManhour $projectWorkPackageManhour)
    {
        //
    }

    /**
     * Determine whether the user can create project work package manhours.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the project work package manhour.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageManhour  $projectWorkPackageManhour
     * @return mixed
     */
    public function update(User $user, ProjectWorkPackageManhour $projectWorkPackageManhour)
    {
        //
    }

    /**
     * Determine whether the user can delete the project work package manhour.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageManhour  $projectWorkPackageManhour
     * @return mixed
     */
    public function delete(User $user, ProjectWorkPackageManhour $projectWorkPackageManhour)
    {
        //
    }

    /**
     * Determine whether the user can restore the project work package manhour.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageManhour  $projectWorkPackageManhour
     * @return mixed
     */
    public function restore(User $user, ProjectWorkPackageManhour $projectWorkPackageManhour)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the project work package manhour.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageManhour  $projectWorkPackageManhour
     * @return mixed
     */
    public function forceDelete(User $user, ProjectWorkPackageManhour $projectWorkPackageManhour)
    {
        //
    }
}
