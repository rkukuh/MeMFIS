<?php

namespace App\Policies;

use App\User;
use App\Models\AircraftZone;
use Illuminate\Auth\Access\HandlesAuthorization;

class AircraftZonePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the aircraft zone.
     *
     * @param  \App\User  $user
     * @param  \App\Models\AircraftZone  $aircraftZone
     * @return mixed
     */
    public function view(User $user, AircraftZone $aircraftZone)
    {
        //
    }

    /**
     * Determine whether the user can create aircraft zones.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the aircraft zone.
     *
     * @param  \App\User  $user
     * @param  \App\Models\AircraftZone  $aircraftZone
     * @return mixed
     */
    public function update(User $user, AircraftZone $aircraftZone)
    {
        //
    }

    /**
     * Determine whether the user can delete the aircraft zone.
     *
     * @param  \App\User  $user
     * @param  \App\Models\AircraftZone  $aircraftZone
     * @return mixed
     */
    public function delete(User $user, AircraftZone $aircraftZone)
    {
        //
    }

    /**
     * Determine whether the user can restore the aircraft zone.
     *
     * @param  \App\User  $user
     * @param  \App\Models\AircraftZone  $aircraftZone
     * @return mixed
     */
    public function restore(User $user, AircraftZone $aircraftZone)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the aircraft zone.
     *
     * @param  \App\User  $user
     * @param  \App\Models\AircraftZone  $aircraftZone
     * @return mixed
     */
    public function forceDelete(User $user, AircraftZone $aircraftZone)
    {
        //
    }
}
