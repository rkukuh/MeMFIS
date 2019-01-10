<?php

namespace App\Models;

use App\MemfisModel;

class EOInstruction extends MemfisModel
{
    protected $table = 'eo_instructions';

    protected $fillable = [
        'work_area',
        'manhour',
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
}
