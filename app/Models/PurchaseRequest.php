<?php

namespace App\Models;

use App\MemfisModel;

class PurchaseRequest extends MemfisModel
{
    protected $fillable = [
        'number',
        'type_id',
        'aircraft_id',
        'requested_at',
        'required_at',
        'description',
    ];

    protected $dates = ['requested_at', 'required_at'];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A purchase request must have an aircraft
     *
     * This function will retrieve the aircraft of a purchase request.
     * See: Aircraft's purchase_requests() method for the inverse
     *
     * @return mixed
     */
    public function aircraft()
    {
        return $this->belongsTo(Aircraft::class);
    }

    /**
     * One-to-Many: A purchase request must have one or more projects
     *
     * This function will retrieve all the projects of a purchase request.
     * See: Project's purchase_request() method for the inverse
     *
     * @return mixed
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * One-to-Many: A task card may have zero or many type.
     *
     * This function will retrieve the type of an task card.
     * See: Type's purchase_requests() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
