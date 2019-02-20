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
