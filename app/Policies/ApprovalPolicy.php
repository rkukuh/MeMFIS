<?php

namespace App\Policies;

use App\User;
use App\Models\Approval;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApprovalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the approval.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Approval  $approval
     * @return mixed
     */
    public function view(User $user, Approval $approval)
    {
        //
    }

    /**
     * Determine whether the user can create approvals.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the approval.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Approval  $approval
     * @return mixed
     */
    public function update(User $user, Approval $approval)
    {
        //
    }

    /**
     * Determine whether the user can delete the approval.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Approval  $approval
     * @return mixed
     */
    public function delete(User $user, Approval $approval)
    {
        //
    }

    /**
     * Determine whether the user can restore the approval.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Approval  $approval
     * @return mixed
     */
    public function restore(User $user, Approval $approval)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the approval.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Approval  $approval
     * @return mixed
     */
    public function forceDelete(User $user, Approval $approval)
    {
        //
    }
}
