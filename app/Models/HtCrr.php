<?php

namespace App\Models;

use App\MemfisModel;

class HtCrr extends MemfisModel
{
    protected $table = 'htcrr';

    protected $fillable = [
        'code',
        'part_number',
        'skill_id',
        'is_rii',
        'estimation_manhour',
        'removed_at',
        'removed_by',
        'installed_at',
        'installed_by',
        'description',
    ];

    protected $dates = [
        'removed_at',
        'installed_at',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: An HT/CRR may have one installer.
     *
     * This function will retrieve the installer of an HT/CRR.
     * See: Employee's htcrr_installed() method for the inverse
     *
     * @return mixed
     */
    public function installedBy()
    {
        return $this->belongsTo(Employee::class, 'installed_by');
    }

    /**
     * One-to-Many: An HT/CRR may have one remover.
     *
     * This function will retrieve the remover of an HT/CRR.
     * See: Employee's htcrr_removed() method for the inverse
     *
     * @return mixed
     */
    public function removedBy()
    {
        return $this->belongsTo(Employee::class, 'removed_by');
    }
}
