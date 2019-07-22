<?php

namespace App\Policies;

use App\User;
use App\Models\QuotationHtcrrItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuotationHtcrrItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the quotation work package htcrr item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationHtcrrItem  $quotationHtcrrItem
     * @return mixed
     */
    public function view(User $user, QuotationHtcrrItem $quotationHtcrrItem)
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
     * @param  \App\Models\QuotationHtcrrItem  $quotationHtcrrItem
     * @return mixed
     */
    public function update(User $user, QuotationHtcrrItem $quotationHtcrrItem)
    {
        //
    }

    /**
     * Determine whether the user can delete the quotation work package htcrr item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationHtcrrItem  $quotationHtcrrItem
     * @return mixed
     */
    public function delete(User $user, QuotationHtcrrItem $quotationHtcrrItem)
    {
        //
    }

    /**
     * Determine whether the user can restore the quotation work package htcrr item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationHtcrrItem  $quotationHtcrrItem
     * @return mixed
     */
    public function restore(User $user, QuotationHtcrrItem $quotationHtcrrItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the quotation work package htcrr item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationHtcrrItem  $quotationHtcrrItem
     * @return mixed
     */
    public function forceDelete(User $user, QuotationHtcrrItem $quotationHtcrrItem)
    {
        //
    }
}
