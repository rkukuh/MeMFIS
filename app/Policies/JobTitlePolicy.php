<?php

namespace App\Policies;

use App\User;
use App\Models\JobTitle;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobTitlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the job title.
     *
     * @param  \App\User  $user
     * @param  \App\Models\JobTitle  $jobTitle
     * @return mixed
     */
    public function view(User $user, JobTitle $jobTitle)
    {
        //
    }

    /**
     * Determine whether the user can create job titles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the job title.
     *
     * @param  \App\User  $user
     * @param  \App\Models\JobTitle  $jobTitle
     * @return mixed
     */
    public function update(User $user, JobTitle $jobTitle)
    {
        //
    }

    /**
     * Determine whether the user can delete the job title.
     *
     * @param  \App\User  $user
     * @param  \App\Models\JobTitle  $jobTitle
     * @return mixed
     */
    public function delete(User $user, JobTitle $jobTitle)
    {
        //
    }

    /**
     * Determine whether the user can restore the job title.
     *
     * @param  \App\User  $user
     * @param  \App\Models\JobTitle  $jobTitle
     * @return mixed
     */
    public function restore(User $user, JobTitle $jobTitle)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the job title.
     *
     * @param  \App\User  $user
     * @param  \App\Models\JobTitle  $jobTitle
     * @return mixed
     */
    public function forceDelete(User $user, JobTitle $jobTitle)
    {
        //
    }
}
