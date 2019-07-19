<?php

namespace App\Policies;

use App\User;
use App\Models\QuotationWorkPackageHtcrrItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuotationWorkPackageHtcrrItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the quotation work package htcrr item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationWorkPackageHtcrrItem  $quotationWorkPackageHtcrrItem
     * @return mixed
     */
    public function view(User $user, QuotationWorkPackageHtcrrItem $quotationWorkPackageHtcrrItem)
    {
        //
    }

    /**
     * Determine whether the user can create quotation work package htcrr items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the quotation work package htcrr item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationWorkPackageHtcrrItem  $quotationWorkPackageHtcrrItem
     * @return mixed
     */
    public function update(User $user, QuotationWorkPackageHtcrrItem $quotationWorkPackageHtcrrItem)
    {
        //
    }

    /**
     * Determine whether the user can delete the quotation work package htcrr item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationWorkPackageHtcrrItem  $quotationWorkPackageHtcrrItem
     * @return mixed
     */
    public function delete(User $user, QuotationWorkPackageHtcrrItem $quotationWorkPackageHtcrrItem)
    {
        //
    }

    /**
     * Determine whether the user can restore the quotation work package htcrr item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationWorkPackageHtcrrItem  $quotationWorkPackageHtcrrItem
     * @return mixed
     */
    public function restore(User $user, QuotationWorkPackageHtcrrItem $quotationWorkPackageHtcrrItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the quotation work package htcrr item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationWorkPackageHtcrrItem  $quotationWorkPackageHtcrrItem
     * @return mixed
     */
    public function forceDelete(User $user, QuotationWorkPackageHtcrrItem $quotationWorkPackageHtcrrItem)
    {
        //
    }
}
