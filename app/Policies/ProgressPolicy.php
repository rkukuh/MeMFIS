<?php

namespace App\Policies;

use App\User;
use App\Models\Progress;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProgressPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the progress.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Progress  $progress
     * @return mixed
     */
    public function view(User $user, Progress $progress)
    {
        //
    }

    /**
     * Determine whether the user can create progresses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the progress.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Progress  $progress
     * @return mixed
     */
    public function update(User $user, Progress $progress)
    {
        //
    }

    /**
     * Determine whether the user can delete the progress.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Progress  $progress
     * @return mixed
     */
    public function delete(User $user, Progress $progress)
    {
        //
    }

    /**
     * Determine whether the user can restore the progress.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Progress  $progress
     * @return mixed
     */
    public function restore(User $user, Progress $progress)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the progress.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Progress  $progress
     * @return mixed
     */
    public function forceDelete(User $user, Progress $progress)
    {
        //
    }
}
