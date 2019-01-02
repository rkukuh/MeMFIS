<?php

namespace App\Policies;

use App\User;
use App\Models\AircraftAccess;
use Illuminate\Auth\Access\HandlesAuthorization;

class AircraftAccessPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the aircraft access.
     *
     * @param  \App\User  $user
     * @param  \App\Models\AircraftAccess  $aircraftAccess
     * @return mixed
     */
    public function view(User $user, AircraftAccess $aircraftAccess)
    {
        //
    }

    /**
     * Determine whether the user can create aircraft accesses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the aircraft access.
     *
     * @param  \App\User  $user
     * @param  \App\Models\AircraftAccess  $aircraftAccess
     * @return mixed
     */
    public function update(User $user, AircraftAccess $aircraftAccess)
    {
        //
    }

    /**
     * Determine whether the user can delete the aircraft access.
     *
     * @param  \App\User  $user
     * @param  \App\Models\AircraftAccess  $aircraftAccess
     * @return mixed
     */
    public function delete(User $user, AircraftAccess $aircraftAccess)
    {
        //
    }

    /**
     * Determine whether the user can restore the aircraft access.
     *
     * @param  \App\User  $user
     * @param  \App\Models\AircraftAccess  $aircraftAccess
     * @return mixed
     */
    public function restore(User $user, AircraftAccess $aircraftAccess)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the aircraft access.
     *
     * @param  \App\User  $user
     * @param  \App\Models\AircraftAccess  $aircraftAccess
     * @return mixed
     */
    public function forceDelete(User $user, AircraftAccess $aircraftAccess)
    {
        //
    }
}
