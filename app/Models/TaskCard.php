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

        /** EO */
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
     * Polymorphic: An employee can have zero or many versions.
     *
     * This function will get all of the task card's versions.
     * See: Version' versionable() method for the inverse
     */
    public function versions()
    {
        return $this->morphMany(Version::class, 'versionable');
    }

    // TODO: M-M relationship with Access
    // TODO: M-M relationship with Zone
}
