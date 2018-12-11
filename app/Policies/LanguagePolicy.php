<?php

namespace App\Policies;

use App\User;
use App\Models\Language;
use Illuminate\Auth\Access\HandlesAuthorization;

class LanguagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the language.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Language  $language
     * @return mixed
     */
    public function view(User $user, Language $language)
    {
        //
    }

    /**
     * Determine whether the user can create languages.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the language.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Language  $language
     * @return mixed
     */
    public function update(User $user, Language $language)
    {
        //
    }

    /**
     * Determine whether the user can delete the language.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Language  $language
     * @return mixed
     */
    public function delete(User $user, Language $language)
    {
        //
    }

    /**
     * Determine whether the user can restore the language.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Language  $language
     * @return mixed
     */
    public function restore(User $user, Language $language)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the language.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Language  $language
     * @return mixed
     */
    public function forceDelete(User $user, Language $language)
    {
        //
    }
}
