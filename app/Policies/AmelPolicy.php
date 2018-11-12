<?php

namespace App\Policies;

use App\User;
use App\Models\Amel;
use Illuminate\Auth\Access\HandlesAuthorization;

class AmelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the ame license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Amel  $amel
     * @return mixed
     */
    public function view(User $user, Amel $amel)
    {
        //
    }

    /**
     * Determine whether the user can create ame licenses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the ame license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Amel  $amel
     * @return mixed
     */
    public function update(User $user, Amel $amel)
    {
        //
    }

    /**
     * Determine whether the user can delete the ame license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Amel  $amel
     * @return mixed
     */
    public function delete(User $user, Amel $amel)
    {
        //
    }

    /**
     * Determine whether the user can restore the ame license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Amel  $amel
     * @return mixed
     */
    public function restore(User $user, Amel $amel)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the ame license.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Amel  $amel
     * @return mixed
     */
    public function forceDelete(User $user, Amel $amel)
    {
        //
    }
}
