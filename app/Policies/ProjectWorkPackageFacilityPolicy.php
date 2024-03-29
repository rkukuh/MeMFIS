<?php

namespace App\Policies;

use App\User;
use App\Models\ProjectWorkPackageFacility;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectWorkPackageFacilityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the project work package facility.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageFacility  $projectWorkPackageFacility
     * @return mixed
     */
    public function view(User $user, ProjectWorkPackageFacility $projectWorkPackageFacility)
    {
        //
    }

    /**
     * Determine whether the user can create project work package facilities.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the project work package facility.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageFacility  $projectWorkPackageFacility
     * @return mixed
     */
    public function update(User $user, ProjectWorkPackageFacility $projectWorkPackageFacility)
    {
        //
    }

    /**
     * Determine whether the user can delete the project work package facility.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageFacility  $projectWorkPackageFacility
     * @return mixed
     */
    public function delete(User $user, ProjectWorkPackageFacility $projectWorkPackageFacility)
    {
        //
    }

    /**
     * Determine whether the user can restore the project work package facility.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageFacility  $projectWorkPackageFacility
     * @return mixed
     */
    public function restore(User $user, ProjectWorkPackageFacility $projectWorkPackageFacility)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the project work package facility.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageFacility  $projectWorkPackageFacility
     * @return mixed
     */
    public function forceDelete(User $user, ProjectWorkPackageFacility $projectWorkPackageFacility)
    {
        //
    }
}
