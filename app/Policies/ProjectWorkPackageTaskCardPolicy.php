<?php

namespace App\Policies;

use App\User;
use App\Models\ProjectWorkPackageTaskCard;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectWorkPackageTaskCardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the project work package task card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageTaskCard  $projectWorkPackageTaskCard
     * @return mixed
     */
    public function view(User $user, ProjectWorkPackageTaskCard $projectWorkPackageTaskCard)
    {
        //
    }

    /**
     * Determine whether the user can create project work package task cards.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the project work package task card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageTaskCard  $projectWorkPackageTaskCard
     * @return mixed
     */
    public function update(User $user, ProjectWorkPackageTaskCard $projectWorkPackageTaskCard)
    {
        //
    }

    /**
     * Determine whether the user can delete the project work package task card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageTaskCard  $projectWorkPackageTaskCard
     * @return mixed
     */
    public function delete(User $user, ProjectWorkPackageTaskCard $projectWorkPackageTaskCard)
    {
        //
    }

    /**
     * Determine whether the user can restore the project work package task card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageTaskCard  $projectWorkPackageTaskCard
     * @return mixed
     */
    public function restore(User $user, ProjectWorkPackageTaskCard $projectWorkPackageTaskCard)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the project work package task card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageTaskCard  $projectWorkPackageTaskCard
     * @return mixed
     */
    public function forceDelete(User $user, ProjectWorkPackageTaskCard $projectWorkPackageTaskCard)
    {
        //
    }
}
