<?php

namespace App\Policies;

use App\User;
use App\Models\EOInstructionWorkPackageSuccessor;
use Illuminate\Auth\Access\HandlesAuthorization;

class EOInstructionWorkPackageSuccessorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the e o instruction work package successor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EOInstructionWorkPackageSuccessor  $eOInstructionWorkPackageSuccessor
     * @return mixed
     */
    public function view(User $user, EOInstructionWorkPackageSuccessor $eOInstructionWorkPackageSuccessor)
    {
        //
    }

    /**
     * Determine whether the user can create e o instruction work package successors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the e o instruction work package successor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EOInstructionWorkPackageSuccessor  $eOInstructionWorkPackageSuccessor
     * @return mixed
     */
    public function update(User $user, EOInstructionWorkPackageSuccessor $eOInstructionWorkPackageSuccessor)
    {
        //
    }

    /**
     * Determine whether the user can delete the e o instruction work package successor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EOInstructionWorkPackageSuccessor  $eOInstructionWorkPackageSuccessor
     * @return mixed
     */
    public function delete(User $user, EOInstructionWorkPackageSuccessor $eOInstructionWorkPackageSuccessor)
    {
        //
    }

    /**
     * Determine whether the user can restore the e o instruction work package successor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EOInstructionWorkPackageSuccessor  $eOInstructionWorkPackageSuccessor
     * @return mixed
     */
    public function restore(User $user, EOInstructionWorkPackageSuccessor $eOInstructionWorkPackageSuccessor)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the e o instruction work package successor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EOInstructionWorkPackageSuccessor  $eOInstructionWorkPackageSuccessor
     * @return mixed
     */
    public function forceDelete(User $user, EOInstructionWorkPackageSuccessor $eOInstructionWorkPackageSuccessor)
    {
        //
    }
}
