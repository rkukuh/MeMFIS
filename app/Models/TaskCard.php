<?php

namespace App\Models;

use App\MemfisModel;

class TaskCard extends MemfisModel
{

    protected $table = 'taskcards';

    protected $fillable = [
        'number',
        'title',
        'type_id',
        'task_id',
        'skill_id',
        'work_area',
        'estimation_manhour',
        'engineer_quantity',
        'helper_quantity',
        'is_rii',
        'source',
        'effectivity',
        'performance_factor',
        'sequence',
        'stringer',
        'version',
        'description',

        /** EO Header */
        'revision',
        'reference',
        'category_id',
        'scheduled_priority_id',
        'scheduled_priority_amount',
        'scheduled_priority_type',
        'recurrence_id',
        'recurrence_amount',
        'recurrence_type',
        'manual_affected_id',
        'manual_affected',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Many-to-Many: A task card may have zero or many (aircraft) access.
     *
     * This function will retrieve all the (aircraft) accesses of a task card.
     * See: Access's taskcards() method for the inverse
     *
     * @return mixed
     */
    public function accesses()
    {
        return $this->belongsToMany(Access::class, 'access_taskcard', 'taskcard_id', 'access_id')
                    ->withTimestamps();
    }

    /**
     * Many-to-Many: A task card may have zero or many aircraft.
     *
     * This function will retrieve all the aircrafts of a task card.
     * See: Aircraft's taskcards() method for the inverse
     *
     * @return mixed
     */
    public function aircrafts()
    {
        return $this->belongsToMany(Aircraft::class, 'aircraft_taskcard', 'taskcard_id', 'aircraft_id')
                    ->withTimestamps();
    }

    /**
     * One-to-Many: A task card EO may have one or many instructions.
     *
     * This function will retrieve all the instructions of a task card EO.
     * See: EOInstruction's eo_header()
     *
     * @return mixed
     */
    public function eo_instructions()
    {
        return $this->hasMany(EOInstruction::class, 'taskcard_id');
    }

    /**
     * Many-to-Many: A task card may have zero or many items.
     *
     * This function will retrieve all the items of a task card.
     * See: Item's taskcards() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_taskcard', 'taskcard_id', 'item_id')
                    ->withPivot(
                        'quantity',
                        'unit_id'
                    )
                    ->withTimestamps();
    }

    /**
     * One-to-Many (with JSON data): A jobcard must have a taskcard
     *
     * This function will retrieve all the jobcards of a taskcard.
     * See: JobCard's taskcard() method for the inverse
     *
     * @return mixed
     */
    public function jobcards()
    {
        return $this->hasMany(JobCard::class);
    }

    /**
     * Many-to-Many (self-join): A task card may have none or many other related task cards.
     *
     * This function will retrieve the parent task cards of a (related-to) task cards.
     * See: TaskCard's related_to() method for the inverse
     *
     * @return mixed
     */
    public function parent()
    {
        return $this->belongsToMany(TaskCard::class, 'taskcard_relations', 'related_to', 'taskcard_id')
                    ->withTrashed();
    }

    /**
     * Many-to-Many (self-join): A task card may have none or many other related task cards.
     *
     * This function will retrieve all the related-to task cards of a task card.
     * See: TaskCard's parent() method for the inverse
     *
     * @return mixed
     */
    public function related_to()
    {
        return $this->belongsToMany(TaskCard::class, 'taskcard_relations', 'taskcard_id', 'related_to')
                    ->withTimestamps();
    }

    /**
     * Polymorphic: A task card can have zero or many repeats.
     *
     * This function will get all of the task card's repeats.
     * See: Repeat's repeatable() method for the inverse
     */
    public function repeats()
    {
        return $this->morphMany(Repeat::class, 'repeatable');
    }

    /**
     * Many-to-Many: A task card may have zero or many (aircraft) station.
     *
     * This function will retrieve all the (aircraft) stationes of a task card.
     * See: Station's taskcards() method for the inverse
     *
     * @return mixed
     */
    public function stations()
    {
        return $this->belongsToMany(Station::class, 'station_taskcard', 'taskcard_id', 'station_id')
                    ->withTimestamps();
    }

    /**
     * One-to-Many: A task card may have zero or many type.
     *
     * This function will retrieve the type of a task card.
     * See: Type's taskcards() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * One-to-Many: A task card may have zero or many task.
     *
     * This function will retrieve the task of a task card.
     * See: Type's taskcard_tasks() method for the inverse
     *
     * @return mixed
     */
    public function task()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Polymorphic: A task card can have zero or many thresholds.
     *
     * This function will get all of the task card's thresholds.
     * See: Threshold's thresholdable() method for the inverse
     */
    public function thresholds()
    {
        return $this->morphMany(Threshold::class, 'thresholdable');
    }

    /**
     * Many-to-Many: A task card may have one or many workpackage.
     *
     * This function will retrieve all the work packages of a task card.
     * See: WorkPackage's taskcards() method for the inverse
     *
     * @return mixed
     */
    public function workpackages()
    {
        return $this->belongsToMany(WorkPackage::class, 'taskcard_workpackage', 'taskcard_id', 'workpackage_id')
                    ->withPivot(
                        'sequence',
                        'is_mandatory'
                    )
                    ->withTimestamps();
    }

    /**
     * Many-to-Many: A task card may have zero or many (aircraft) zone.
     *
     * This function will retrieve all the (aircraft) zones of a task card.
     * See: Zone's taskcards() method for the inverse
     *
     * @return mixed
     */
    public function zones()
    {
        return $this->belongsToMany(Access::class, 'taskcard_zone', 'taskcard_id', 'zone_id')
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
