<?php

namespace App\Models;

use App\MemfisModel;
use Directoryxx\Finac\Model\Coa;

class Coas extends MemfisModel
{
    protected $table = 'coables';

    protected $fillable = [
        'coable_type',
        'coable_id',
        'coa_id',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all of the owning approvable models.
     * See:
     *
     * @return mixed
     */
    public function coable()
    {
        return $this->morphTo();
    }

    /**
     * One-to-Many: An coa (of anything) may have one coa.
     *
     * This function will retrieve the coa of a given coa (of anything).
     * See: coa's coas() method for the inverse
     *
     * @return mixed
     */
    public function coa()
    {
        return $this->belongsTo(Coa::class, 'coa_id');
    }
}
