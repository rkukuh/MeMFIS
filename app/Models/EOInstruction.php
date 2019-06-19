<?php

namespace App\Models;

use App\MemfisModel;

class EOInstruction extends MemfisModel
{
    protected $table = 'eo_instructions';

    protected $fillable = [
        'taskcard_id',
        'work_area',
        'estimation_manhour',
        'engineer_quantity',
        'helper_quantity',
        'is_rii',
        'performance_factor',
        'sequence',
        'description',
        'note',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A task card EO may have one or many instructions.
     *
     * This function will retrieve the header of a task card EO instruction.
     * See: TaskCard's eo_instructions()
     *
     * @return mixed
     */
    public function eo_header()
    {
        return $this->belongsTo(TaskCard::class, 'taskcard_id');
    }

    /**
     * Many-to-Many: A task card (EO) may have zero or many items.
     *
     * This function will retrieve all the items of a task card (EO).
     * See: Item's eo_instructions() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'eo_item', 'eo_id', 'item_id')
                    ->withPivot(
                        'quantity',
                        'unit_id'
                    )
                    ->withTimestamps();
    }

    /**
     * One-to-Many: A task card EO may have zero or many skill.
     *
     * This function will retrieve all the skills of a task card EO.
     * See: Type's skill_eo_instructions() method for the inverse
     *
     * @return mixed
     */
    public function skills()
    {
        return $this->belongsToMany(Type::class, 'eo_instruction_skill', 'eo_instruction_id', 'skill_id')
                    ->withTimestamps();;
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
