<?php

namespace App\Models;

use App\MemfisModel;

class WorkPackage extends MemfisModel
{
    protected $table = 'workpackages';

    protected $fillable = [
        'code',
        'title',
        'is_template',
        'aircraft_id',
        'description',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A workpackage must have an aircraft
     *
     * This function will retrieve the aircraft of a workpackage.
     * See: Aircraft's workpackages() method for the inverse
     *
     * @return mixed
     */
    public function aircraft()
    {
        return $this->belongsTo(Aircraft::class);
    }

    /**
     * Many-to-Many: A work package may have one or many item.
     *
     * This function will retrieve all the items of a work package.
     * See: Item's workpackages() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_workpackage', 'workpackage_id', 'item_id')
                    ->withPivot(
                        'quantity',
                        'unit_id'
                    )
                    ->withTimestamps();
    }

    /**
     * Many-to-Many: A project may have one or many workpackage.
     *
     * This function will retrieve all the projects of a work package.
     * See: Project's workpackages() method for the inverse
     *
     * @return mixed
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_workpackage', 'workpackage_id', 'project_id')
                    ->withPivot('performance_factor')
                    ->withTimestamps();
    }

    /**
     * Many-to-Many: A quotation may have one or many workpackage.
     *
     * This function will retrieve all the quotations of a workpackage.
     * See: Quotation's workpackages() method for the inverse
     *
     * @return mixed
     */
    public function quotations()
    {
        return $this->belongsToMany(Quotation::class, 'quotation_workpackage', 'workpackage_id', 'quotation_id')
                    ->withPivot(
                        'manhour_total',
                        'manhour_rate',
                        'discount_type',
                        'discount_value',
                        'description'
                    )
                    ->withTimestamps();
    }

    /**
     * Many-to-Many: A task card may have one or many workpackage.
     *
     * This function will retrieve all the task cards of a work package.
     * See: TaskCard's workpackages() method for the inverse
     *
     * @return mixed
     */
    public function taskcards()
    {
        return $this->belongsToMany(TaskCard::class, 'taskcard_workpackage', 'workpackage_id', 'taskcard_id')
                    ->withPivot(
                        'sequence',
                        'is_mandatory'
                    )
                    ->withTimestamps();
    }


    /*************************************** ACCESSOR ****************************************/

    /**
     * Get the task card's item: material.
     *
     * @return string
     */
    public function getMaterialsAttribute()
    {
        return collect(array_values($this->items->load('unit')->where('categories.0.code', 'raw')->all()));
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
