<?php

namespace App\Policies;

use App\User;
use App\Models\TaskCardWorkPackage;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskCardWorkPackagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the task card work package.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TaskCardWorkPackage  $taskCardWorkPackage
     * @return mixed
     */
    public function view(User $user, TaskCardWorkPackage $taskCardWorkPackage)
    {
        //
    }

    /**
     * Determine whether the user can create task card work packages.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the task card work package.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TaskCardWorkPackage  $taskCardWorkPackage
     * @return mixed
     */
    public function update(User $user, TaskCardWorkPackage $taskCardWorkPackage)
    {
        //
    }

    /**
     * Determine whether the user can delete the task card work package.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TaskCardWorkPackage  $taskCardWorkPackage
     * @return mixed
     */
    public function delete(User $user, TaskCardWorkPackage $taskCardWorkPackage)
    {
        //
    }

    /**
     * Determine whether the user can restore the task card work package.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TaskCardWorkPackage  $taskCardWorkPackage
     * @return mixed
     */
    public function restore(User $user, TaskCardWorkPackage $taskCardWorkPackage)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the task card work package.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TaskCardWorkPackage  $taskCardWorkPackage
     * @return mixed
     */
    public function forceDelete(User $user, TaskCardWorkPackage $taskCardWorkPackage)
    {
        //
    }
}
