<?php

namespace App\Policies;

use App\User;
use App\Models\Benefit;
use Illuminate\Auth\Access\HandlesAuthorization;

class BenefitPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the benefit.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Benefit  $benefit
     * @return mixed
     */
    public function view(User $user, Benefit $benefit)
    {
        //
    }

    /**
     * Determine whether the user can create benefits.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the benefit.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Benefit  $benefit
     * @return mixed
     */
    public function update(User $user, Benefit $benefit)
    {
        //
    }

    /**
     * Determine whether the user can delete the benefit.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Benefit  $benefit
     * @return mixed
     */
    public function delete(User $user, Benefit $benefit)
    {
        //
    }

    /**
     * Determine whether the user can restore the benefit.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Benefit  $benefit
     * @return mixed
     */
    public function restore(User $user, Benefit $benefit)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the benefit.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Benefit  $benefit
     * @return mixed
     */
    public function forceDelete(User $user, Benefit $benefit)
    {
        //
    }
}
