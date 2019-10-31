<?php

namespace App\Policies;

use App\User;
use App\Models\RIRDocumentCheck;
use Illuminate\Auth\Access\HandlesAuthorization;

class RIRDocumentCheckPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the r i r document check.
     *
     * @param  \App\User  $user
     * @param  \App\Models\RIRDocumentCheck  $rIRDocumentCheck
     * @return mixed
     */
    public function view(User $user, RIRDocumentCheck $rIRDocumentCheck)
    {
        //
    }

    /**
     * Determine whether the user can create r i r document checks.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the r i r document check.
     *
     * @param  \App\User  $user
     * @param  \App\Models\RIRDocumentCheck  $rIRDocumentCheck
     * @return mixed
     */
    public function update(User $user, RIRDocumentCheck $rIRDocumentCheck)
    {
        //
    }

    /**
     * Determine whether the user can delete the r i r document check.
     *
     * @param  \App\User  $user
     * @param  \App\Models\RIRDocumentCheck  $rIRDocumentCheck
     * @return mixed
     */
    public function delete(User $user, RIRDocumentCheck $rIRDocumentCheck)
    {
        //
    }

    /**
     * Determine whether the user can restore the r i r document check.
     *
     * @param  \App\User  $user
     * @param  \App\Models\RIRDocumentCheck  $rIRDocumentCheck
     * @return mixed
     */
    public function restore(User $user, RIRDocumentCheck $rIRDocumentCheck)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the r i r document check.
     *
     * @param  \App\User  $user
     * @param  \App\Models\RIRDocumentCheck  $rIRDocumentCheck
     * @return mixed
     */
    public function forceDelete(User $user, RIRDocumentCheck $rIRDocumentCheck)
    {
        //
    }
}
