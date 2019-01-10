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
        'task_type_id',
        'work_area',
        'manhour',
        'helper_quantity',
        'is_rii',
        'source',
        'effectivity',
        'description',
        'version',
        'performance_factor',
        'sequence',

        /** EO Header */
        'revision',
        'ref_no',
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
     * One-to-Many: A task card may have zero or many type.
     *
     * This function will retrieve the type of an task card.
     * See: Type's taskcards() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
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
}
