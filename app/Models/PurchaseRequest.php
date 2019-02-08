<?php

namespace App\Models;

use App\MemfisModel;

class PurchaseRequest extends MemfisModel
{
    protected $fillable = [
        'number',
        'type_id',
        'requested_at',
        'required_at',
        'description',
    ];

    protected $dates = ['requested_at', 'required_at'];

    /*************************************** RELATIONSHIP ****************************************/

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
