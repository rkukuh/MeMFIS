<?php

namespace App\Policies;

use App\User;
use App\Models\Journal;
use Illuminate\Auth\Access\HandlesAuthorization;

class JournalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the journal.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Journal  $journal
     * @return mixed
     */
    public function view(User $user, Journal $journal)
    {
        //
    }

    /**
     * Determine whether the user can create journals.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the journal.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Journal  $journal
     * @return mixed
     */
    public function update(User $user, Journal $journal)
    {
        //
    }

    /**
     * Determine whether the user can delete the journal.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Journal  $journal
     * @return mixed
     */
    public function delete(User $user, Journal $journal)
    {
        //
    }

    /**
     * Determine whether the user can restore the journal.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Journal  $journal
     * @return mixed
     */
    public function restore(User $user, Journal $journal)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the journal.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Journal  $journal
     * @return mixed
     */
    public function forceDelete(User $user, Journal $journal)
    {
        //
    }
}
