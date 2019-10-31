<?php

namespace App\Models;

use App\MemfisModel;

class RIRDocumentCheck extends MemfisModel
{
    protected $table = 'rir_document_checks';

    protected $fillable = [
        'rir_id',
        'general_document',
        'technical_document',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-Way: An RIR's Document Checks must have an RIR assigned to.
     *
     * @return mixed
     */
    public function rir()
    {
        return $this->belongsTo(RIR::class);
    }

    /**
     * One-Way: An RIR's Document Checks must have a general document assigned to.
     *
     * @return mixed
     */
    public function general_document()
    {
        return $this->belongsTo(Type::class, 'general_document');
    }

    /**
     * One-Way: An RIR's Document Checks must have a technical document assigned to.
     *
     * @return mixed
     */
    public function technical_document()
    {
        return $this->belongsTo(Type::class, 'technical_document');
    }
}
