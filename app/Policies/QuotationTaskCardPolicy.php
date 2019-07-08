<?php

namespace App\Policies;

use App\User;
use App\Models\QuotationTaskCard;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuotationTaskCardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the quotation task card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationTaskCard  $quotationTaskCard
     * @return mixed
     */
    public function view(User $user, QuotationTaskCard $quotationTaskCard)
    {
        //
    }

    /**
     * Determine whether the user can create quotation task cards.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the quotation task card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationTaskCard  $quotationTaskCard
     * @return mixed
     */
    public function update(User $user, QuotationTaskCard $quotationTaskCard)
    {
        //
    }

    /**
     * Determine whether the user can delete the quotation task card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationTaskCard  $quotationTaskCard
     * @return mixed
     */
    public function delete(User $user, QuotationTaskCard $quotationTaskCard)
    {
        //
    }

    /**
     * Determine whether the user can restore the quotation task card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationTaskCard  $quotationTaskCard
     * @return mixed
     */
    public function restore(User $user, QuotationTaskCard $quotationTaskCard)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the quotation task card.
     *
     * @param  \App\User  $user
     * @param  \App\Models\QuotationTaskCard  $quotationTaskCard
     * @return mixed
     */
    public function forceDelete(User $user, QuotationTaskCard $quotationTaskCard)
    {
        //
    }
}
