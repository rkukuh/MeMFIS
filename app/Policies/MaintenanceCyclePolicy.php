<?php

namespace App\Policies;

use App\User;
use App\Models\MaintenanceCycle;
use Illuminate\Auth\Access\HandlesAuthorization;

class MaintenanceCyclePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the maintenance cycle.
     *
     * @param  \App\User  $user
     * @param  \App\Models\MaintenanceCycle  $maintenanceCycle
     * @return mixed
     */
    public function view(User $user, MaintenanceCycle $maintenanceCycle)
    {
        //
    }

    /**
     * Determine whether the user can create maintenance cycles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the maintenance cycle.
     *
     * @param  \App\User  $user
     * @param  \App\Models\MaintenanceCycle  $maintenanceCycle
     * @return mixed
     */
    public function update(User $user, MaintenanceCycle $maintenanceCycle)
    {
        //
    }

    /**
     * Determine whether the user can delete the maintenance cycle.
     *
     * @param  \App\User  $user
     * @param  \App\Models\MaintenanceCycle  $maintenanceCycle
     * @return mixed
     */
    public function delete(User $user, MaintenanceCycle $maintenanceCycle)
    {
        //
    }

    /**
     * Determine whether the user can restore the maintenance cycle.
     *
     * @param  \App\User  $user
     * @param  \App\Models\MaintenanceCycle  $maintenanceCycle
     * @return mixed
     */
    public function restore(User $user, MaintenanceCycle $maintenanceCycle)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the maintenance cycle.
     *
     * @param  \App\User  $user
     * @param  \App\Models\MaintenanceCycle  $maintenanceCycle
     * @return mixed
     */
    public function forceDelete(User $user, MaintenanceCycle $maintenanceCycle)
    {
        //
    }
}
