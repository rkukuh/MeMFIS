<?php

namespace App\Policies;

use App\User;
use App\Models\OTRCertification;
use Illuminate\Auth\Access\HandlesAuthorization;

class OTRCertificationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the o t r certification.
     *
     * @param  \App\User  $user
     * @param  \App\Models\OTRCertification  $otrCertification
     * @return mixed
     */
    public function view(User $user, OTRCertification $otrCertification)
    {
        //
    }

    /**
     * Determine whether the user can create o t r certifications.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the o t r certification.
     *
     * @param  \App\User  $user
     * @param  \App\Models\OTRCertification  $otrCertification
     * @return mixed
     */
    public function update(User $user, OTRCertification $otrCertification)
    {
        //
    }

    /**
     * Determine whether the user can delete the o t r certification.
     *
     * @param  \App\User  $user
     * @param  \App\Models\OTRCertification  $otrCertification
     * @return mixed
     */
    public function delete(User $user, OTRCertification $otrCertification)
    {
        //
    }

    /**
     * Determine whether the user can restore the o t r certification.
     *
     * @param  \App\User  $user
     * @param  \App\Models\OTRCertification  $otrCertification
     * @return mixed
     */
    public function restore(User $user, OTRCertification $otrCertification)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the o t r certification.
     *
     * @param  \App\User  $user
     * @param  \App\Models\OTRCertification  $otrCertification
     * @return mixed
     */
    public function forceDelete(User $user, OTRCertification $otrCertification)
    {
        //
    }
}
