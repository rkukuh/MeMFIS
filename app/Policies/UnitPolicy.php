<?php

namespace App\Policies;

use App\User;
use App\Models\Unit;
use Illuminate\Auth\Access\HandlesAuthorization;

class UnitPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the unit.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Unit  $unit
     * @return mixed
     */
    public function view(User $user, Unit $unit)
    {
        //
    }

    /**
     * Determine whether the user can create units.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the unit.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Unit  $unit
     * @return mixed
     */
    public function update(User $user, Unit $unit)
    {
        //
    }

    /**
     * Determine whether the user can delete the unit.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Unit  $unit
     * @return mixed
     */
    public function delete(User $user, Unit $unit)
    {
        //
    }

    /**
     * Determine whether the user can restore the unit.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Unit  $unit
     * @return mixed
     */
    public function restore(User $user, Unit $unit)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the unit.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Unit  $unit
     * @return mixed
     */
    public function forceDelete(User $user, Unit $unit)
    {
        //
    }
}
