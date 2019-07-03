<?php

namespace App\Policies;

use App\User;
use App\Models\QuotationWorkPackageItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuotationWorkPackageItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the quotation work package item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationWorkPackageItem  $quotationWorkPackageItem
     * @return mixed
     */
    public function view(User $user, QuotationWorkPackageItem $quotationWorkPackageItem)
    {
        //
    }

    /**
     * Determine whether the user can create quotation work package items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the quotation work package item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationWorkPackageItem  $quotationWorkPackageItem
     * @return mixed
     */
    public function update(User $user, QuotationWorkPackageItem $quotationWorkPackageItem)
    {
        //
    }

    /**
     * Determine whether the user can delete the quotation work package item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationWorkPackageItem  $quotationWorkPackageItem
     * @return mixed
     */
    public function delete(User $user, QuotationWorkPackageItem $quotationWorkPackageItem)
    {
        //
    }

    /**
     * Determine whether the user can restore the quotation work package item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationWorkPackageItem  $quotationWorkPackageItem
     * @return mixed
     */
    public function restore(User $user, QuotationWorkPackageItem $quotationWorkPackageItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the quotation work package item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationWorkPackageItem  $quotationWorkPackageItem
     * @return mixed
     */
    public function forceDelete(User $user, QuotationWorkPackageItem $quotationWorkPackageItem)
    {
        //
    }
}
