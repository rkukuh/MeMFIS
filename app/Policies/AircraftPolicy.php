<?php

namespace App\Policies;

use App\User;
use App\Models\Aircraft;
use Illuminate\Auth\Access\HandlesAuthorization;

class AircraftPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the aircraft.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Aircraft  $aircraft
     * @return mixed
     */
    public function view(User $user, Aircraft $aircraft)
    {
        //
    }

    /**
     * Determine whether the user can create aircrafts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the aircraft.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Aircraft  $aircraft
     * @return mixed
     */
    public function update(User $user, Aircraft $aircraft)
    {
        //
    }

    /**
     * Determine whether the user can delete the aircraft.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Aircraft  $aircraft
     * @return mixed
     */
    public function delete(User $user, Aircraft $aircraft)
    {
        //
    }

    /**
     * Determine whether the user can restore the aircraft.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Aircraft  $aircraft
     * @return mixed
     */
    public function restore(User $user, Aircraft $aircraft)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the aircraft.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Aircraft  $aircraft
     * @return mixed
     */
    public function forceDelete(User $user, Aircraft $aircraft)
    {
        //
    }
}
