<?php

namespace App\Models;

use App\MemfisModel;

class Quotation extends MemfisModel
{
    protected $fillable = [
        'number',
        'requested_at',
        'valid_until',
        'exchange_rate',
        'scheduled_payment_type',
        'scheduled_payment_amount',
        'total',
        'term_of_condition',
        'description',
    ];

    protected $dates = ['requested_at', 'valid_until'];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A quotation may have one or many scheduled payment.
     *
     * This function will retrieve the scheduled payments of a quotation.
     * See: Quotation's scheduledpayment() method for the inverse
     *
     * @return mixed
     */
    public function scheduledpayments()
    {
        return $this->hasMany(ScheduledPayment::class);
    }
}
