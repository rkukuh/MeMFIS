<?php

namespace App\Policies;

use App\User;
use App\Models\Phone;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhonePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the phone.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Phone  $phone
     * @return mixed
     */
    public function view(User $user, Phone $phone)
    {
        //
    }

    /**
     * Determine whether the user can create phones.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the phone.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Phone  $phone
     * @return mixed
     */
    public function update(User $user, Phone $phone)
    {
        //
    }

    /**
     * Determine whether the user can delete the phone.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Phone  $phone
     * @return mixed
     */
    public function delete(User $user, Phone $phone)
    {
        //
    }

    /**
     * Determine whether the user can restore the phone.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Phone  $phone
     * @return mixed
     */
    public function restore(User $user, Phone $phone)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the phone.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Phone  $phone
     * @return mixed
     */
    public function forceDelete(User $user, Phone $phone)
    {
        //
    }
}
