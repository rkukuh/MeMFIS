<?php

namespace App\Policies;

use App\User;
use App\Models\Threshold;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThresholdPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the threshold.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Threshold  $threshold
     * @return mixed
     */
    public function view(User $user, Threshold $threshold)
    {
        //
    }

    /**
     * Determine whether the user can create thresholds.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the threshold.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Threshold  $threshold
     * @return mixed
     */
    public function update(User $user, Threshold $threshold)
    {
        //
    }

    /**
     * Determine whether the user can delete the threshold.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Threshold  $threshold
     * @return mixed
     */
    public function delete(User $user, Threshold $threshold)
    {
        //
    }

    /**
     * Determine whether the user can restore the threshold.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Threshold  $threshold
     * @return mixed
     */
    public function restore(User $user, Threshold $threshold)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the threshold.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Threshold  $threshold
     * @return mixed
     */
    public function forceDelete(User $user, Threshold $threshold)
    {
        //
    }
}
