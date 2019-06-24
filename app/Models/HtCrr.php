<?php

namespace App\Models;

use App\MemfisModel;

class HtCrr extends MemfisModel
{
    protected $table = 'htcrr';

    protected $fillable = [
        'code',
        'type_id',
        'project_id',
        'position',
        'sn_on',
        'sn_off',
        'pn_on',
        'pn_off',
        'is_rii',
        'estimation_manhour',
        'removed_at',
        'removed_by',
        'removal_manhour_estimation',
        'installed_at',
        'installed_by',
        'installation_manhour_estimation',
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
     * Polymorphic: An entity can have zero or many progresses.
     *
     * This function will get all HtCrr's progresses.
     * See: Progress's progressable() method for the inverse
     *
     * @return mixed
     */
    public function progresses()
    {
        return $this->morphMany(Progress::class, 'progressable');
    }

    /**
     * One-to-Many: An HT/CRR may have none or many project.
     *
     * This function will retrieve the project of a given HT/CRR.
     * See: Project's htcrr() method for the inverse
     *
     * @return mixed
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
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

    /**
     * Many-to-Many: An HTCRR may have zero or many skill.
     *
     * This function will retrieve all the skills of an HTCRR.
     * See: Type's skill_htcrr() method for the inverse
     *
     * @return mixed
     */
    public function skills()
    {
        return $this->belongsToMany(Type::class, 'htcrr_skill', 'htcrr_id', 'skill_id')
                    ->withTimestamps();;
    }

    /**
     * One-to-Many: An HTCRR may have zero or many type.
     *
     * This function will retrieve the type of an HTCRR.
     * See: Type's type_htcrrs() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
