<?php

namespace App\Models;

use App\MemfisModel;

class Manhour extends MemfisModel
{
    protected $fillable = [
        'rate',
        'level',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: An HT/CRR may have one manhour rate.
     *
     * This function will all the HT/CRRs of a given manhour rate.
     * See: HtCrr's manhour_rate() method for the inverse
     *
     * @return mixed
     */
    public function htcrr()
    {
        return $this->hasMany(HtCrr::class, 'manhour_rate_id');
    }
}
