<?php

namespace App\Policies;

use App\User;
use App\Models\Payroll;
use Illuminate\Auth\Access\HandlesAuthorization;

class PayrollPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the payroll.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Payroll  $payroll
     * @return mixed
     */
    public function view(User $user, Payroll $payroll)
    {
        //
    }

    /**
     * Determine whether the user can create payrolls.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the payroll.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Payroll  $payroll
     * @return mixed
     */
    public function update(User $user, Payroll $payroll)
    {
        //
    }

    /**
     * Determine whether the user can delete the payroll.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Payroll  $payroll
     * @return mixed
     */
    public function delete(User $user, Payroll $payroll)
    {
        //
    }

    /**
     * Determine whether the user can restore the payroll.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Payroll  $payroll
     * @return mixed
     */
    public function restore(User $user, Payroll $payroll)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the payroll.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Payroll  $payroll
     * @return mixed
     */
    public function forceDelete(User $user, Payroll $payroll)
    {
        //
    }
}
