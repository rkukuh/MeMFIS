<?php

namespace App\Policies;

use App\User;
use App\Models\Manufacturer;
use Illuminate\Auth\Access\HandlesAuthorization;

class ManufacturerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the manufacturer.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return mixed
     */
    public function view(User $user, Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Determine whether the user can create manufacturers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the manufacturer.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return mixed
     */
    public function update(User $user, Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Determine whether the user can delete the manufacturer.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return mixed
     */
    public function delete(User $user, Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Determine whether the user can restore the manufacturer.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return mixed
     */
    public function restore(User $user, Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the manufacturer.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return mixed
     */
    public function forceDelete(User $user, Manufacturer $manufacturer)
    {
        //
    }
}
