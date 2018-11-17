<?php

namespace App\Policies;

use App\User;
use App\Models\Website;
use Illuminate\Auth\Access\HandlesAuthorization;

class WebsitePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the website.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Website  $website
     * @return mixed
     */
    public function view(User $user, Website $website)
    {
        //
    }

    /**
     * Determine whether the user can create websites.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the website.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Website  $website
     * @return mixed
     */
    public function update(User $user, Website $website)
    {
        //
    }

    /**
     * Determine whether the user can delete the website.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Website  $website
     * @return mixed
     */
    public function delete(User $user, Website $website)
    {
        //
    }

    /**
     * Determine whether the user can restore the website.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Website  $website
     * @return mixed
     */
    public function restore(User $user, Website $website)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the website.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Website  $website
     * @return mixed
     */
    public function forceDelete(User $user, Website $website)
    {
        //
    }
}
