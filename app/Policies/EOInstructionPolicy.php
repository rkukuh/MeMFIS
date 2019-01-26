<?php

namespace App\Policies;

use App\User;
use App\Models\EOInstruction;
use Illuminate\Auth\Access\HandlesAuthorization;

class EOInstructionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the e o instruction.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EOInstruction  $eOInstruction
     * @return mixed
     */
    public function view(User $user, EOInstruction $eOInstruction)
    {
        //
    }

    /**
     * Determine whether the user can create e o instructions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the e o instruction.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EOInstruction  $eOInstruction
     * @return mixed
     */
    public function update(User $user, EOInstruction $eOInstruction)
    {
        //
    }

    /**
     * Determine whether the user can delete the e o instruction.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EOInstruction  $eOInstruction
     * @return mixed
     */
    public function delete(User $user, EOInstruction $eOInstruction)
    {
        //
    }

    /**
     * Determine whether the user can restore the e o instruction.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EOInstruction  $eOInstruction
     * @return mixed
     */
    public function restore(User $user, EOInstruction $eOInstruction)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the e o instruction.
     *
     * @param  \App\User  $user
     * @param  \App\Models\EOInstruction  $eOInstruction
     * @return mixed
     */
    public function forceDelete(User $user, EOInstruction $eOInstruction)
    {
        //
    }
}
