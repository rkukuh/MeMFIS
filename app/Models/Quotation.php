<?php

namespace App\Models;

use App\MemfisModel;

class Quotation extends MemfisModel
{
    //

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
