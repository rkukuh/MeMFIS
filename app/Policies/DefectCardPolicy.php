<?php

namespace App\Policies;

use App\User;
use App\Models\DefectCard;
use Illuminate\Auth\Access\HandlesAuthorization;

class DefectCardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the defect card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\DefectCard  $defectCard
     * @return mixed
     */
    public function view(User $user, DefectCard $defectCard)
    {
        //
    }

    /**
     * Determine whether the user can create defect cards.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the defect card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\DefectCard  $defectCard
     * @return mixed
     */
    public function update(User $user, DefectCard $defectCard)
    {
        //
    }

    /**
     * Determine whether the user can delete the defect card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\DefectCard  $defectCard
     * @return mixed
     */
    public function delete(User $user, DefectCard $defectCard)
    {
        //
    }

    /**
     * Determine whether the user can restore the defect card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\DefectCard  $defectCard
     * @return mixed
     */
    public function restore(User $user, DefectCard $defectCard)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the defect card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\DefectCard  $defectCard
     * @return mixed
     */
    public function forceDelete(User $user, DefectCard $defectCard)
    {
        //
    }
}
