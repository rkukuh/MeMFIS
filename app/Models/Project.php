<?php

namespace App\Models;

use App\MemfisModel;

class Project extends MemfisModel
{
    protected $fillable = [
        'code',
        'title',
        'customer_id',
        'aircraft_id',
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

    /**
     * One-to-Many: A project must have an aircraft
     *
     * This function will retrieve the aircraft of a project.
     * See: Aircraft's projects() method for the inverse
     *
     * @return mixed
     */
    public function aircraft()
    {
        return $this->belongsTo(Aircraft::class);
    }
}
