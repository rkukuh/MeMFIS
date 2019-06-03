<?php

namespace App\Models;

use App\MemfisModel;

class DefectCard extends MemfisModel
{
    protected $table = 'defectcards';

    protected $fillable = [
        'code',
        'jobcard_id',
        'engineer_quantity',
        'helper_quantity',
        'estimation_manhour',
        'is_rii',
        'propose_correction_id',
        'propose_correction_other',
        'complaint',
        'description',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A Job Card may have none or many Defect Card.
     *
     * This function will retrieve the Job Card of a given Defect Card.
     * See: JobCard's defectcards() method for the inverse
     *
     * @return mixed
     */
    public function jobcard()
    {
        return $this->belongsTo(JobCard::class);
    }

    /**
     * One-Way: A Defect Card must have a propose correction.
     *
     * @return mixed
     */
    public function propose_correction()
    {
        return $this->belongsTo(Type::class);
    }
}
