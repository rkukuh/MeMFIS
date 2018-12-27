<?php

namespace App\Models;

use App\MemfisModel;

class ScheduledPayment extends MemfisModel
{
    protected $table = 'scheduledpayments';

    protected $fillable = [
        'quotation_id',
        'type_id',
        'value',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A scheduled payment may have zero or many type.
     *
     * This function will retrieve the type of an scheduled payment.
     * See: Type's scheduledpayments() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
