<?php

namespace App\Policies;

use App\User;
use App\Models\Supplier;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupplierPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the supplier.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Supplier  $supplier
     * @return mixed
     */
    public function view(User $user, Supplier $supplier)
    {
        //
    }

    /**
     * Determine whether the user can create suppliers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the supplier.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Supplier  $supplier
     * @return mixed
     */
    public function update(User $user, Supplier $supplier)
    {
        //
    }

    /**
     * Determine whether the user can delete the supplier.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Supplier  $supplier
     * @return mixed
     */
    public function delete(User $user, Supplier $supplier)
    {
        //
    }

    /**
     * Determine whether the user can restore the supplier.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Supplier  $supplier
     * @return mixed
     */
    public function restore(User $user, Supplier $supplier)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the supplier.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Supplier  $supplier
     * @return mixed
     */
    public function forceDelete(User $user, Supplier $supplier)
    {
        //
    }
}
