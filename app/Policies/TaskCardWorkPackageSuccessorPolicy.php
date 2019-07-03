<?php

namespace App\Policies;

use App\User;
use App\Models\TaskCardWorkPackageSuccessor;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskCardWorkPackageSuccessorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the task card work package successor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TaskCardWorkPackageSuccessor  $taskCardWorkPackageSuccessor
     * @return mixed
     */
    public function view(User $user, TaskCardWorkPackageSuccessor $taskCardWorkPackageSuccessor)
    {
        //
    }

    /**
     * Determine whether the user can create task card work package successors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the task card work package successor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TaskCardWorkPackageSuccessor  $taskCardWorkPackageSuccessor
     * @return mixed
     */
    public function update(User $user, TaskCardWorkPackageSuccessor $taskCardWorkPackageSuccessor)
    {
        //
    }

    /**
     * Determine whether the user can delete the task card work package successor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TaskCardWorkPackageSuccessor  $taskCardWorkPackageSuccessor
     * @return mixed
     */
    public function delete(User $user, TaskCardWorkPackageSuccessor $taskCardWorkPackageSuccessor)
    {
        //
    }

    /**
     * Determine whether the user can restore the task card work package successor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TaskCardWorkPackageSuccessor  $taskCardWorkPackageSuccessor
     * @return mixed
     */
    public function restore(User $user, TaskCardWorkPackageSuccessor $taskCardWorkPackageSuccessor)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the task card work package successor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TaskCardWorkPackageSuccessor  $taskCardWorkPackageSuccessor
     * @return mixed
     */
    public function forceDelete(User $user, TaskCardWorkPackageSuccessor $taskCardWorkPackageSuccessor)
    {
        //
    }
}
