<?php

namespace App\Policies;

use App\User;
use App\Models\QuotationTaskCardItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuotationTaskCardItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the quotation task card item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationTaskCardItem  $quotationTaskCardItem
     * @return mixed
     */
    public function view(User $user, QuotationTaskCardItem $quotationTaskCardItem)
    {
        //
    }

    /**
     * Determine whether the user can create quotation task card items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the quotation task card item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationTaskCardItem  $quotationTaskCardItem
     * @return mixed
     */
    public function update(User $user, QuotationTaskCardItem $quotationTaskCardItem)
    {
        //
    }

    /**
     * Determine whether the user can delete the quotation task card item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationTaskCardItem  $quotationTaskCardItem
     * @return mixed
     */
    public function delete(User $user, QuotationTaskCardItem $quotationTaskCardItem)
    {
        //
    }

    /**
     * Determine whether the user can restore the quotation task card item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationTaskCardItem  $quotationTaskCardItem
     * @return mixed
     */
    public function restore(User $user, QuotationTaskCardItem $quotationTaskCardItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the quotation task card item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationTaskCardItem  $quotationTaskCardItem
     * @return mixed
     */
    public function forceDelete(User $user, QuotationTaskCardItem $quotationTaskCardItem)
    {
        //
    }
}
