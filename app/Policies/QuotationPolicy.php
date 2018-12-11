<?php

namespace App\Policies;

use App\User;
use App\Models\Quotation;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuotationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the quotation.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Quotation  $quotation
     * @return mixed
     */
    public function view(User $user, Quotation $quotation)
    {
        //
    }

    /**
     * Determine whether the user can create quotations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the quotation.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Quotation  $quotation
     * @return mixed
     */
    public function update(User $user, Quotation $quotation)
    {
        //
    }

    /**
     * Determine whether the user can delete the quotation.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Quotation  $quotation
     * @return mixed
     */
    public function delete(User $user, Quotation $quotation)
    {
        //
    }

    /**
     * Determine whether the user can restore the quotation.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Quotation  $quotation
     * @return mixed
     */
    public function restore(User $user, Quotation $quotation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the quotation.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Quotation  $quotation
     * @return mixed
     */
    public function forceDelete(User $user, Quotation $quotation)
    {
        //
    }
}
