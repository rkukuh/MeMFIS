<?php

namespace App\Policies;

use App\User;
use App\Models\ScheduledPayment;
use Illuminate\Auth\Access\HandlesAuthorization;

class ScheduledPaymentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the scheduled payment.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ScheduledPayment  $scheduledPayment
     * @return mixed
     */
    public function view(User $user, ScheduledPayment $scheduledPayment)
    {
        //
    }

    /**
     * Determine whether the user can create scheduled payments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the scheduled payment.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ScheduledPayment  $scheduledPayment
     * @return mixed
     */
    public function update(User $user, ScheduledPayment $scheduledPayment)
    {
        //
    }

    /**
     * Determine whether the user can delete the scheduled payment.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ScheduledPayment  $scheduledPayment
     * @return mixed
     */
    public function delete(User $user, ScheduledPayment $scheduledPayment)
    {
        //
    }

    /**
     * Determine whether the user can restore the scheduled payment.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ScheduledPayment  $scheduledPayment
     * @return mixed
     */
    public function restore(User $user, ScheduledPayment $scheduledPayment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the scheduled payment.
     *
     * @param  \App\User  $user
     * @param  \App\Models\ScheduledPayment  $scheduledPayment
     * @return mixed
     */
    public function forceDelete(User $user, ScheduledPayment $scheduledPayment)
    {
        //
    }
}
