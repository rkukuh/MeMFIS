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
        'manhour_total',
        'manhour_rate',
        'discount_type',
        'discount_value',
        'description',

        'origin_type',
        'origin_project',
        'origin_conducted_by',
        'origin_htcrr',
        'origin_htcrr_items',
        'origin_htcrr_skills',
        'origin_htcrr_helpers',
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
     * Many-to-Many: A HTCRR may have zero or many engineer.
     *
     * This function will retrieve all the engineers of a HTCRR.
     * See: Employee's htcrr_engineers() method for the inverse
     *
     * @return mixed
     */
    public function engineers()
    {
        return $this->belongsToMany(Employee::class, 'htcrr_engineers', 'htcrr_id', 'employee_id')
                    ->withPivot('quantity')
                    ->withTimestamps();;
    }

    /**
     * Many-to-Many: A HTCRR may have zero or many helper.
     *
     * This function will retrieve all the helpers of a HTCRR.
     * See: Employee's htcrr_helpers() method for the inverse
     *
     * @return mixed
     */
    public function helpers()
    {
        return $this->belongsToMany(Employee::class, 'employee_htcrr', 'htcrr_id', 'employee_id')
                    ->withTimestamps();;
    }

    /**
     * Many-to-Many: An HTCRR may have one or many item.
     *
     * This function will retrieve all the items of an HTCRR.
     * See: Item's htcrr() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'htcrr_item', 'htcrr_id', 'item_id')
                    ->withPivot(
                        'quantity',
                        'unit_id',
                        'note'
                    )
                    ->withTimestamps();
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

    /*************************************** ACCESSOR ****************************************/

    /**
     * Get the task card's item: material.
     *
     * @return string
     */
    public function getMaterialsAttribute()
    {
        return collect(array_values($this->items->load('unit')
                                                ->whereIn('categories.0.code', ['raw', 'cons', 'comp'])
                                                ->all()));
    }

    /**
     * Get the task card's item: tool.
     *
     * @return string
     */
    public function getToolsAttribute()
    {
        return collect(array_values($this->items->load('unit')->where('categories.0.code', 'tool')->all()));
    }
}
