<?php

namespace App\Models;

use App\MemfisModel;

class HtCrr extends MemfisModel
{
    protected $table = 'htcrr';

    protected $fillable = [
        'code',
        'parent_id',
        'type_id',
        'project_id',
        'position',
        'serial_number',
        'part_number',
        'conducted_at',
        'conducted_by',
        'estimation_manhour',
        'is_rii',
        'description',
    ];

    protected $dates = ['conducted_at'];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many (self-join): An HTCRR may have none or many sub-HTCRR.
     *
     * This function will retrieve the sub-HTCRR of an HTCRR, if any.
     * See: HtCrr's parent() method for the inverse
     *
     * @return mixed
     */
    public function childs()
    {
        return $this->hasMany(HtCrr::class, 'parent_id');
    }

    /**
     * One-to-Many: An HTCRR may have one remover / installer.
     *
     * This function will retrieve the removed / installer of an HTCRR.
     * See: Employee's conducted_htcrr() method for the inverse
     *
     * @return mixed
     */
    public function conductedBy()
    {
        return $this->belongsTo(Employee::class, 'conducted_by');
    }

    /**
     * One-to-Many (self-join): An HTCRR may have none or many sub-HTCRR.
     *
     * This function will retrieve the parent of a sub-HTCRR.
     * See: HtCrr's childs() method for the inverse
     *
     * @return mixed
     */
    public function parent()
    {
        return $this->belongsTo(HtCrr::class, 'parent_id');
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
