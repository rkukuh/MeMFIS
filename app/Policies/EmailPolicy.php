<?php

namespace App\Policies;

use App\User;
use App\Models\Email;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmailPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the email.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Email  $email
     * @return mixed
     */
    public function view(User $user, Email $email)
    {
        //
    }

    /**
     * Determine whether the user can create emails.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the email.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Email  $email
     * @return mixed
     */
    public function update(User $user, Email $email)
    {
        //
    }

    /**
     * Determine whether the user can delete the email.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Email  $email
     * @return mixed
     */
    public function delete(User $user, Email $email)
    {
        //
    }

    /**
     * Determine whether the user can restore the email.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Email  $email
     * @return mixed
     */
    public function restore(User $user, Email $email)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the email.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Email  $email
     * @return mixed
     */
    public function forceDelete(User $user, Email $email)
    {
        //
    }
}
