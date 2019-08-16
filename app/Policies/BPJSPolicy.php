<?php

namespace App\Policies;

use App\User;
use App\Models\BPJS;
use Illuminate\Auth\Access\HandlesAuthorization;

class BPJSPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the b p j s.
     *
     * @param  \App\User  $user
     * @param  \App\Models\BPJS  $bPJS
     * @return mixed
     */
    public function view(User $user, BPJS $bPJS)
    {
        //
    }

    /**
     * Determine whether the user can create b p j s s.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the b p j s.
     *
     * @param  \App\User  $user
     * @param  \App\Models\BPJS  $bPJS
     * @return mixed
     */
    public function update(User $user, BPJS $bPJS)
    {
        //
    }

    /**
     * Determine whether the user can delete the b p j s.
     *
     * @param  \App\User  $user
     * @param  \App\Models\BPJS  $bPJS
     * @return mixed
     */
    public function delete(User $user, BPJS $bPJS)
    {
        //
    }

    /**
     * Determine whether the user can restore the b p j s.
     *
     * @param  \App\User  $user
     * @param  \App\Models\BPJS  $bPJS
     * @return mixed
     */
    public function restore(User $user, BPJS $bPJS)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the b p j s.
     *
     * @param  \App\User  $user
     * @param  \App\Models\BPJS  $bPJS
     * @return mixed
     */
    public function forceDelete(User $user, BPJS $bPJS)
    {
        //
    }
}
