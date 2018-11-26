<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskCard extends Model
{
    protected $table = 'taskcards';

    protected $fillable = [
        'title',
        'type_id',
        'otr_certification_id',
        'work_area',
        'zone',
        'zoneaccess',
        'is_rii',
        'applicability_airplane',
        'applicability_engine',
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

    /**
     * Polymorphic: A task card can have zero or many descriptions.
     *
     * This function will get all of the category's description.
     * See: Description's descriptionable() method for the inverse
     */
    public function descriptions()
    {
        return $this->morphMany(Description::class, 'descriptionable');
    }
}
