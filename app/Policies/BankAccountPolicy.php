<?php

namespace App\Policies;

use App\User;
use App\Models\BankAccount;
use Illuminate\Auth\Access\HandlesAuthorization;

class BankAccountPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the bank account.
     *
     * @param  \App\User  $user
     * @param  \App\Models\BankAccount  $bankAccount
     * @return mixed
     */
    public function view(User $user, BankAccount $bankAccount)
    {
        //
    }

    /**
     * Determine whether the user can create bank accounts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the bank account.
     *
     * @param  \App\User  $user
     * @param  \App\Models\BankAccount  $bankAccount
     * @return mixed
     */
    public function update(User $user, BankAccount $bankAccount)
    {
        //
    }

    /**
     * Determine whether the user can delete the bank account.
     *
     * @param  \App\User  $user
     * @param  \App\Models\BankAccount  $bankAccount
     * @return mixed
     */
    public function delete(User $user, BankAccount $bankAccount)
    {
        //
    }

    /**
     * Determine whether the user can restore the bank account.
     *
     * @param  \App\User  $user
     * @param  \App\Models\BankAccount  $bankAccount
     * @return mixed
     */
    public function restore(User $user, BankAccount $bankAccount)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the bank account.
     *
     * @param  \App\User  $user
     * @param  \App\Models\BankAccount  $bankAccount
     * @return mixed
     */
    public function forceDelete(User $user, BankAccount $bankAccount)
    {
        //
    }
}
