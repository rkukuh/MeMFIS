<?php

namespace App\Policies;

use App\User;
use App\Models\JobCard;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobCardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the job card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\JobCard  $jobCard
     * @return mixed
     */
    public function view(User $user, JobCard $jobCard)
    {
        //
    }

    /**
     * Determine whether the user can create job cards.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the job card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\JobCard  $jobCard
     * @return mixed
     */
    public function update(User $user, JobCard $jobCard)
    {
        //
    }

    /**
     * Determine whether the user can delete the job card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\JobCard  $jobCard
     * @return mixed
     */
    public function delete(User $user, JobCard $jobCard)
    {
        //
    }

    /**
     * Determine whether the user can restore the job card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\JobCard  $jobCard
     * @return mixed
     */
    public function restore(User $user, JobCard $jobCard)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the job card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\JobCard  $jobCard
     * @return mixed
     */
    public function forceDelete(User $user, JobCard $jobCard)
    {
        //
    }
}
