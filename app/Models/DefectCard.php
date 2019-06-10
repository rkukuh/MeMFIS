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
        'propose_correction_text',
        'complaint',
        'description',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all Quotation's approvals.
     * See: Approvals's approvable() method for the inverse
     */
    public function approvals()
    {
        return $this->morphMany(Approval::class, 'approvable');
    }

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
     * Polymorphic: An entity can have zero or many progresses.
     *
     * This function will get all DefectCard's progresses.
     * See: Progress's progressable() method for the inverse
     */
    public function progresses()
    {
        return $this->morphMany(Progress::class, 'progressable');
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
