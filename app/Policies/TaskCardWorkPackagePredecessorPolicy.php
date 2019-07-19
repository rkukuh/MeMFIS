<?php

namespace App\Policies;

use App\User;
use App\Models\TaskCardWorkPackagePredecessor;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskCardWorkPackagePredecessorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the task card work package predecessor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TaskCardWorkPackagePredecessor  $taskCardWorkPackagePredecessor
     * @return mixed
     */
    public function view(User $user, TaskCardWorkPackagePredecessor $taskCardWorkPackagePredecessor)
    {
        //
    }

    /**
     * Determine whether the user can create task card work package predecessors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the task card work package predecessor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TaskCardWorkPackagePredecessor  $taskCardWorkPackagePredecessor
     * @return mixed
     */
    public function update(User $user, TaskCardWorkPackagePredecessor $taskCardWorkPackagePredecessor)
    {
        //
    }

    /**
     * Determine whether the user can delete the task card work package predecessor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TaskCardWorkPackagePredecessor  $taskCardWorkPackagePredecessor
     * @return mixed
     */
    public function delete(User $user, TaskCardWorkPackagePredecessor $taskCardWorkPackagePredecessor)
    {
        //
    }

    /**
     * Determine whether the user can restore the task card work package predecessor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TaskCardWorkPackagePredecessor  $taskCardWorkPackagePredecessor
     * @return mixed
     */
    public function restore(User $user, TaskCardWorkPackagePredecessor $taskCardWorkPackagePredecessor)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the task card work package predecessor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TaskCardWorkPackagePredecessor  $taskCardWorkPackagePredecessor
     * @return mixed
     */
    public function forceDelete(User $user, TaskCardWorkPackagePredecessor $taskCardWorkPackagePredecessor)
    {
        //
    }
}
