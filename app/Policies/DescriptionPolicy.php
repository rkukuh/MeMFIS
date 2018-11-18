<?php

namespace App\Policies;

use App\User;
use App\Models\Description;
use Illuminate\Auth\Access\HandlesAuthorization;

class DescriptionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the description.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Description  $description
     * @return mixed
     */
    public function view(User $user, Description $description)
    {
        //
    }

    /**
     * Determine whether the user can create descriptions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the description.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Description  $description
     * @return mixed
     */
    public function update(User $user, Description $description)
    {
        //
    }

    /**
     * Determine whether the user can delete the description.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Description  $description
     * @return mixed
     */
    public function delete(User $user, Description $description)
    {
        //
    }

    /**
     * Determine whether the user can restore the description.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Description  $description
     * @return mixed
     */
    public function restore(User $user, Description $description)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the description.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Description  $description
     * @return mixed
     */
    public function forceDelete(User $user, Description $description)
    {
        //
    }
}
