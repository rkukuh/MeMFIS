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
        'complaint',
        'description',
        'note',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all Quotation's approvals.
     * See: Approvals's approvable() method for the inverse
     *
     * @return mixed
     */
    public function approvals()
    {
        return $this->morphMany(Approval::class, 'approvable');
    }

    /**
     * Many-to-Many: A defect card may have zero or many item.
     *
     * This function will retrieve all the items of a defect card.
     * See: Item's defectcards() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'defectcard_item', 'defectcard_id', 'item_id')
                    ->withPivot(
                        'quantity',
                        'unit_id',
                        'ipc_ref',
                        'sn_on',
                        'sn_off'
                    )
                    ->withTimestamps();
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
     *
     * @return mixed
     */
    public function progresses()
    {
        return $this->morphMany(Progress::class, 'progressable');
    }

    /**
     * One-to-Many: A defect card may have zero or many propose correction.
     *
     * This function will retrieve all propose corrections of a defect card.
     * See: Type's defectcards() method for the inverse
     *
     * @return mixed
     */
    public function propose_corrections()
    {
        return $this->belongsToMany(Type::class, 'defectcard_propose_correction', 'defectcard_id', 'propose_correction_id')
                    ->withPivot('propose_correction_text')
                    ->withTimestamps();;
    }

    /*************************************** ACCESSOR ****************************************/

    /**
     * Get the task card's item: material.
     *
     * @return string
     */
    public function getMaterialsAttribute()
    {
        return collect(array_values($this->items->load('unit')->where('categories.0.code', 'raw')->all()));
    }

    /**
     * Get the task card's item: tool.
     *
     * @return string
     */
    public function getToolsAttribute()
    {
        return collect(array_values($this->items->load('unit')->where('categories.0.code', 'tool')->all()));
    }
}
