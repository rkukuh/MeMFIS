<?php

namespace App\Policies;

use App\User;
use App\Models\Mutation;
use Illuminate\Auth\Access\HandlesAuthorization;

class MutationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the mutation.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Mutation  $mutation
     * @return mixed
     */
    public function view(User $user, Mutation $mutation)
    {
        //
    }

    /**
     * Determine whether the user can create mutations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the mutation.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Mutation  $mutation
     * @return mixed
     */
    public function update(User $user, Mutation $mutation)
    {
        //
    }

    /**
     * Determine whether the user can delete the mutation.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Mutation  $mutation
     * @return mixed
     */
    public function delete(User $user, Mutation $mutation)
    {
        //
    }

    /**
     * Determine whether the user can restore the mutation.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Mutation  $mutation
     * @return mixed
     */
    public function restore(User $user, Mutation $mutation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the mutation.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Mutation  $mutation
     * @return mixed
     */
    public function forceDelete(User $user, Mutation $mutation)
    {
        //
    }
}
