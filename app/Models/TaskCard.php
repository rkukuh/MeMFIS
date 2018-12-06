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
        'work_area',
        'zone',
        'access',
        'is_rii',
        'is_applicability_aircraft_all',
        'is_applicability_engine_all',
        'source',
        'effectivity',
    ];

    /*************************************** RELATIONSHIP ****************************************/

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
}
