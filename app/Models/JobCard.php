<?php

namespace App\Models;

use App\MemfisModel;

class JobCard extends MemfisModel
{
    protected $table = 'jobcards';

    protected $fillable = [
        'number',
        'taskcard_id',
        'data_taskcard',
        'data_taskcard_items',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many statuses.
     *
     * This function will get all of the jobcard's statuses.
     * See: Access's accessable() method for the inverse
     */
    public function statuses()
    {
        return $this->morphMany(Status::class, 'statusable');
    }

    /**
     * One-to-Many (with JSON data): A jobcard must have a taskcard
     *
     * This function will retrieve the taskcard of a jobcard.
     * See: TaskCard's jobcards() method for the inverse
     *
     * @return mixed
     */
    public function taskcard()
    {
        return $this->belongsTo(TaskCard::class);
    }
}
