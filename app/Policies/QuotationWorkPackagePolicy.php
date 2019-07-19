<?php

namespace App\Policies;

use App\User;
use App\Models\QuotationWorkPackage;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuotationWorkPackagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the quotation work package.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationWorkPackage  $quotationWorkPackage
     * @return mixed
     */
    public function view(User $user, QuotationWorkPackage $quotationWorkPackage)
    {
        //
    }

    /**
     * Determine whether the user can create quotation work packages.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the quotation work package.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationWorkPackage  $quotationWorkPackage
     * @return mixed
     */
    public function update(User $user, QuotationWorkPackage $quotationWorkPackage)
    {
        //
    }

    /**
     * Determine whether the user can delete the quotation work package.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationWorkPackage  $quotationWorkPackage
     * @return mixed
     */
    public function delete(User $user, QuotationWorkPackage $quotationWorkPackage)
    {
        //
    }

    /**
     * Determine whether the user can restore the quotation work package.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationWorkPackage  $quotationWorkPackage
     * @return mixed
     */
    public function restore(User $user, QuotationWorkPackage $quotationWorkPackage)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the quotation work package.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationWorkPackage  $quotationWorkPackage
     * @return mixed
     */
    public function forceDelete(User $user, QuotationWorkPackage $quotationWorkPackage)
    {
        //
    }
}
