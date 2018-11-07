<?php

namespace App\Policies;

use App\User;
use App\Models\TaskCard;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskCardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the task card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TaskCard  $taskCard
     * @return mixed
     */
    public function view(User $user, TaskCard $taskCard)
    {
        //
    }

    /**
     * Determine whether the user can create task cards.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the task card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TaskCard  $taskCard
     * @return mixed
     */
    public function update(User $user, TaskCard $taskCard)
    {
        //
    }

    /**
     * Determine whether the user can delete the task card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TaskCard  $taskCard
     * @return mixed
     */
    public function delete(User $user, TaskCard $taskCard)
    {
        //
    }

    /**
     * Determine whether the user can restore the task card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TaskCard  $taskCard
     * @return mixed
     */
    public function restore(User $user, TaskCard $taskCard)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the task card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\TaskCard  $taskCard
     * @return mixed
     */
    public function forceDelete(User $user, TaskCard $taskCard)
    {
        //
    }
}
