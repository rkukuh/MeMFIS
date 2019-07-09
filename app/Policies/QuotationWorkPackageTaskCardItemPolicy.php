<?php

namespace App\Policies;

use App\User;
use App\Models\QuotationWorkPackageTaskCardItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuotationWorkPackageTaskCardItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the quotation work package task card item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationWorkPackageTaskCardItem  $quotationWorkPackageTaskCardItem
     * @return mixed
     */
    public function view(User $user, QuotationWorkPackageTaskCardItem $quotationWorkPackageTaskCardItem)
    {
        //
    }

    /**
     * Determine whether the user can create quotation work package task card items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the quotation work package task card item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationWorkPackageTaskCardItem  $quotationWorkPackageTaskCardItem
     * @return mixed
     */
    public function update(User $user, QuotationWorkPackageTaskCardItem $quotationWorkPackageTaskCardItem)
    {
        //
    }

    /**
     * Determine whether the user can delete the quotation work package task card item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationWorkPackageTaskCardItem  $quotationWorkPackageTaskCardItem
     * @return mixed
     */
    public function delete(User $user, QuotationWorkPackageTaskCardItem $quotationWorkPackageTaskCardItem)
    {
        //
    }

    /**
     * Determine whether the user can restore the quotation work package task card item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationWorkPackageTaskCardItem  $quotationWorkPackageTaskCardItem
     * @return mixed
     */
    public function restore(User $user, QuotationWorkPackageTaskCardItem $quotationWorkPackageTaskCardItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the quotation work package task card item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationWorkPackageTaskCardItem  $quotationWorkPackageTaskCardItem
     * @return mixed
     */
    public function forceDelete(User $user, QuotationWorkPackageTaskCardItem $quotationWorkPackageTaskCardItem)
    {
        //
    }
}
