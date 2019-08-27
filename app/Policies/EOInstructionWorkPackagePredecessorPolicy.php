<?php

namespace App\Policies;

use App\User;
use App\Models\EOInstructionWorkPackagePredecessor;
use Illuminate\Auth\Access\HandlesAuthorization;

class EOInstructionWorkPackagePredecessorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the e o instruction work package predecessor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EOInstructionWorkPackagePredecessor  $eOInstructionWorkPackagePredecessor
     * @return mixed
     */
    public function view(User $user, EOInstructionWorkPackagePredecessor $eOInstructionWorkPackagePredecessor)
    {
        //
    }

    /**
     * Determine whether the user can create e o instruction work package predecessors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the e o instruction work package predecessor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EOInstructionWorkPackagePredecessor  $eOInstructionWorkPackagePredecessor
     * @return mixed
     */
    public function update(User $user, EOInstructionWorkPackagePredecessor $eOInstructionWorkPackagePredecessor)
    {
        //
    }

    /**
     * Determine whether the user can delete the e o instruction work package predecessor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EOInstructionWorkPackagePredecessor  $eOInstructionWorkPackagePredecessor
     * @return mixed
     */
    public function delete(User $user, EOInstructionWorkPackagePredecessor $eOInstructionWorkPackagePredecessor)
    {
        //
    }

    /**
     * Determine whether the user can restore the e o instruction work package predecessor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EOInstructionWorkPackagePredecessor  $eOInstructionWorkPackagePredecessor
     * @return mixed
     */
    public function restore(User $user, EOInstructionWorkPackagePredecessor $eOInstructionWorkPackagePredecessor)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the e o instruction work package predecessor.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EOInstructionWorkPackagePredecessor  $eOInstructionWorkPackagePredecessor
     * @return mixed
     */
    public function forceDelete(User $user, EOInstructionWorkPackagePredecessor $eOInstructionWorkPackagePredecessor)
    {
        //
    }
}
