<?php

namespace App\Policies;

use App\User;
use App\Models\QuotationDefectCardItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuotationDefectCardItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the quotation defect card item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationDefectCardItem  $quotationDefectCardItem
     * @return mixed
     */
    public function view(User $user, QuotationDefectCardItem $quotationDefectCardItem)
    {
        //
    }

    /**
     * Determine whether the user can create quotation defect card items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the quotation defect card item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationDefectCardItem  $quotationDefectCardItem
     * @return mixed
     */
    public function update(User $user, QuotationDefectCardItem $quotationDefectCardItem)
    {
        //
    }

    /**
     * Determine whether the user can delete the quotation defect card item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationDefectCardItem  $quotationDefectCardItem
     * @return mixed
     */
    public function delete(User $user, QuotationDefectCardItem $quotationDefectCardItem)
    {
        //
    }

    /**
     * Determine whether the user can restore the quotation defect card item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationDefectCardItem  $quotationDefectCardItem
     * @return mixed
     */
    public function restore(User $user, QuotationDefectCardItem $quotationDefectCardItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the quotation defect card item.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationDefectCardItem  $quotationDefectCardItem
     * @return mixed
     */
    public function forceDelete(User $user, QuotationDefectCardItem $quotationDefectCardItem)
    {
        //
    }
}
