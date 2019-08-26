<?php

namespace App\Policies;

use App\User;
use App\Models\ProjectWorkPackageEOInstruction;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectWorkPackageEOInstructionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the project work package e o instruction.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageEOInstruction  $projectWorkPackageEOInstruction
     * @return mixed
     */
    public function view(User $user, ProjectWorkPackageEOInstruction $projectWorkPackageEOInstruction)
    {
        //
    }

    /**
     * Determine whether the user can create project work package e o instructions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the project work package e o instruction.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageEOInstruction  $projectWorkPackageEOInstruction
     * @return mixed
     */
    public function update(User $user, ProjectWorkPackageEOInstruction $projectWorkPackageEOInstruction)
    {
        //
    }

    /**
     * Determine whether the user can delete the project work package e o instruction.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageEOInstruction  $projectWorkPackageEOInstruction
     * @return mixed
     */
    public function delete(User $user, ProjectWorkPackageEOInstruction $projectWorkPackageEOInstruction)
    {
        //
    }

    /**
     * Determine whether the user can restore the project work package e o instruction.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageEOInstruction  $projectWorkPackageEOInstruction
     * @return mixed
     */
    public function restore(User $user, ProjectWorkPackageEOInstruction $projectWorkPackageEOInstruction)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the project work package e o instruction.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ProjectWorkPackageEOInstruction  $projectWorkPackageEOInstruction
     * @return mixed
     */
    public function forceDelete(User $user, ProjectWorkPackageEOInstruction $projectWorkPackageEOInstruction)
    {
        //
    }
}
