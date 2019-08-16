<?php

namespace App\Policies;

use App\User;
use App\Models\JobTittle;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobTittlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the job tittle.
     *
     * @param  \App\User  $user
     * @param  \App\Models\JobTittle  $jobTittle
     * @return mixed
     */
    public function view(User $user, JobTittle $jobTittle)
    {
        //
    }

    /**
     * Determine whether the user can create job tittles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the job tittle.
     *
     * @param  \App\User  $user
     * @param  \App\Models\JobTittle  $jobTittle
     * @return mixed
     */
    public function update(User $user, JobTittle $jobTittle)
    {
        //
    }

    /**
     * Determine whether the user can delete the job tittle.
     *
     * @param  \App\User  $user
     * @param  \App\Models\JobTittle  $jobTittle
     * @return mixed
     */
    public function delete(User $user, JobTittle $jobTittle)
    {
        //
    }

    /**
     * Determine whether the user can restore the job tittle.
     *
     * @param  \App\User  $user
     * @param  \App\Models\JobTittle  $jobTittle
     * @return mixed
     */
    public function restore(User $user, JobTittle $jobTittle)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the job tittle.
     *
     * @param  \App\User  $user
     * @param  \App\Models\JobTittle  $jobTittle
     * @return mixed
     */
    public function forceDelete(User $user, JobTittle $jobTittle)
    {
        //
    }
}
