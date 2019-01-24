<?php

namespace App\Models;

use App\MemfisModel;

class Project extends MemfisModel
{
    protected $fillable = [
        'code',
        'title',
        'customer_id',
        'no_wo',
        'aircraft_register',
        'aircraft_sn',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A project must have a customer
     *
     * This function will retrieve the customer of a project.
     * See: Customer's projects() method for the inverse
     *
     * @return mixed
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
