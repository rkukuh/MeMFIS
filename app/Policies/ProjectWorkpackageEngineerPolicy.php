<?php

namespace App\Policies;

use App\User;
use App\Models\ProjectWorkpackageEngineer;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectWorkpackageEngineerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the project workpackage engineer.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkpackageEngineer  $projectWorkpackageEngineer
     * @return mixed
     */
    public function view(User $user, ProjectWorkpackageEngineer $projectWorkpackageEngineer)
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
     * @param  \App\Models\ProjectWorkpackageEngineer  $projectWorkpackageEngineer
     * @return mixed
     */
    public function update(User $user, ProjectWorkpackageEngineer $projectWorkpackageEngineer)
    {
        //
    }

    /**
     * Determine whether the user can delete the project workpackage engineer.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkpackageEngineer  $projectWorkpackageEngineer
     * @return mixed
     */
    public function delete(User $user, ProjectWorkpackageEngineer $projectWorkpackageEngineer)
    {
        //
    }

    /**
     * Determine whether the user can restore the project workpackage engineer.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkpackageEngineer  $projectWorkpackageEngineer
     * @return mixed
     */
    public function restore(User $user, ProjectWorkpackageEngineer $projectWorkpackageEngineer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the project workpackage engineer.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkpackageEngineer  $projectWorkpackageEngineer
     * @return mixed
     */
    public function forceDelete(User $user, ProjectWorkpackageEngineer $projectWorkpackageEngineer)
    {
        //
    }
}
