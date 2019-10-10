<?php

namespace App\Policies;

use App\User;
use App\Models\EOInstructionWorkPackage;
use Illuminate\Auth\Access\HandlesAuthorization;

class EOInstructionWorkPackagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the e o instruction work package.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EOInstructionWorkPackage  $eOInstructionWorkPackage
     * @return mixed
     */
    public function view(User $user, EOInstructionWorkPackage $eOInstructionWorkPackage)
    {
        //
    }

    /**
     * Determine whether the user can create e o instruction work packages.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the e o instruction work package.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EOInstructionWorkPackage  $eOInstructionWorkPackage
     * @return mixed
     */
    public function update(User $user, EOInstructionWorkPackage $eOInstructionWorkPackage)
    {
        //
    }

    /**
     * Determine whether the user can delete the e o instruction work package.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EOInstructionWorkPackage  $eOInstructionWorkPackage
     * @return mixed
     */
    public function delete(User $user, EOInstructionWorkPackage $eOInstructionWorkPackage)
    {
        //
    }

    /**
     * Determine whether the user can restore the e o instruction work package.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EOInstructionWorkPackage  $eOInstructionWorkPackage
     * @return mixed
     */
    public function restore(User $user, EOInstructionWorkPackage $eOInstructionWorkPackage)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the e o instruction work package.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EOInstructionWorkPackage  $eOInstructionWorkPackage
     * @return mixed
     */
    public function forceDelete(User $user, EOInstructionWorkPackage $eOInstructionWorkPackage)
    {
        //
    }
}
