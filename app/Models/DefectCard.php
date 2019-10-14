<?php

namespace App\Models;

use Carbon\Carbon;
use App\MemfisModel;

class DefectCard extends MemfisModel
{
    protected $table = 'defectcards';

    protected $fillable = [
        'code',
        'jobcard_id',
        'project_additional_id',
        'engineer_quantity',
        'helper_quantity',
        'estimation_manhour',
        'is_rii',
        'complaint',
        'sequence',
        'ata',
        'description',
        'origin_jobcard',
        'origin_project_additional',
        'origin_quotation_additional',
        'origin_defectcard_items',
        'origin_defectcard_propose_corrections',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all DefectCard's approvals.
     * See: Approvals's approvable() method for the inverse
     *
     * @return mixed
     */
    public function approvals()
    {
        return $this->morphMany(Approval::class, 'approvable');
    }

    /**
     * Many-to-Many: A Defect Card may have zero or many helper.
     *
     * This function will retrieve all the helpers of a Defect Card.
     * See: Employee's defectcards() method for the inverse
     *
     * @return mixed
     */
    public function helpers()
    {
        return $this->belongsToMany(Employee::class, 'defectcard_employee', 'defectcard_id', 'employee_id')
                    ->withPivot('additionals')
                    ->withTimestamps();
    }

    /**
     * Polymorphic: An entity can have zero or many inspections.
     *
     * This function will get all JobCard's inspections.
     * See: Inspection's inspectable() method for the inverse
     *
     * @return mixed
     */
    public function inspections()
    {
        return $this->morphMany(Progress::class, 'inspectable');
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
                        'sn_off',
                        'note'
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
     * One-to-Many: A Project (additional) may have zero or many Defect Cards.
     *
     * This function will retrieve the project (additional) of a given Defect Card.
     * See: Project's defectcards() method for the inverse
     *
     * @return mixed
     */
    public function project_additional()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * One-to-Many: A defect card may have zero or many propose correction.
     *
     * This function will retrieve all propose corrections of a defect card.
     * See: Type's propose_correction_defectcards() method for the inverse
     *
     * @return mixed
     */
    public function propose_corrections()
    {
        return $this->belongsToMany(Type::class, 'defectcard_propose_correction', 'defectcard_id', 'propose_correction_id')
                    ->withPivot('propose_correction_text')
                    ->withTimestamps();
    }

    /**
     * One-to-Many: A Quotation (additional) may have zero or many Defect Cards.
     *
     * This function will retrieve the quotation (additional) of a given Defect Card.
     * See: Quotation's defectcards() method for the inverse
     *
     * @return mixed
     */
    public function quotation_additional()
    {
        return $this->belongsTo(Quotation::class);
    }

    /**
     * Many-to-Many: A Defect Card may have zero or many skill.
     *
     * This function will retrieve all the skills of a Defect Card.
     * See: Type's skill_defectcards() method for the inverse
     *
     * @return mixed
     */
    public function skills()
    {
        return $this->belongsToMany(Type::class, 'defectcard_skill', 'defectcard_id', 'skill_id')
                    ->withTimestamps();
    }

    /**
     * Many-to-Many: A defect card may have zero or many aircraft's zone.
     *
     * This function will retrieve all the aircraft's zones of a defect card.
     * See: Zone's defectcards() method for the inverse
     *
     * @return mixed
     */
    public function zones()
    {
        return $this->belongsToMany(Zone::class, 'defectcard_zone', 'defectcard_id', 'zone_id')
                    ->withTimestamps();
    }

    /*************************************** ACCESSOR ****************************************/

    /**
     * Get the actual manhour jobcard.
     *
     * @return string
     */
    public function getActualManhourAttribute()
    {
        $statuses = Status::ofDefectCard()->get();
        foreach($this->helpers as $helper){
            $helper->userID .= $helper->user->id;
        }

        $manhours = 0;

        //calculating defect card's actual manhours
        $manhours = 0;
        foreach($this->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
            $date1 = null;
            foreach($values as $value){
                if($statuses->where('id',$value->status_id)->first()->code <> "open" or $statuses->where('id',$value->status_id)->first()->code <> "released" or $statuses->where('id',$value->status_id)->first()->code <> "rii-released"){
                    if($this->helpers->where('userID',$key)->first() == null){
                        if($date1 <> null){
                            $t1 = Carbon::parse($date1);
                            $t2 = Carbon::parse($value->created_at);
                            $diff = $t1->diffInSeconds($t2);
                            $manhours = $manhours + $diff;
                        }
                        $date1 = $value->created_at;
                    }
                }

            }
        }
        $manhours = $manhours/3600;
        $manhours_break = 0;
        foreach($this->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
            for($i=0; $i<sizeOf($values->toArray()); $i++){
                if($statuses->where('id',$values[$i]->status_id)->first()->code == "pending"){
                    if($this->helpers->where('userID',$key)->first() == null){
                        if($date1 <> null){
                            if($i+1 < sizeOf($values->toArray())){
                                $t2 = Carbon::parse($values[$i]->created_at);
                                $t3 = Carbon::parse($values[$i+1]->created_at);
                                $diff = $t2->diffInSeconds($t3);
                                $manhours_break = $manhours_break + $diff;
                            }
                        }
                    }
                }
            }
        }

        $manhours_break = $manhours_break/3600;
        $actual_manhours =number_format($manhours-$manhours_break, 2);

        return $actual_manhours;
    }

    /**
     * Get the task card's item: material.
     *
     * @return string
     */
    public function getMaterialsAttribute()
    {
        return collect(array_values($this->items->load('unit')
                                                ->whereIn('categories.0.code', ['raw', 'cons', 'comp'])
                                                ->all()));
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

    /**
     * Get the task card's Skill.
     *
     * @return string
     */
    public function getSkillAttribute()
    {
        if(isset($this->skills) ) {
            if(sizeof($this->skills) == 3){
                $skill = "ERI";
            }
            else if(sizeof($this->skills) == 1){
                $skill = $this->skills[0]->name;
            }
            else{
                $skill = '';
            }
        }

        return $skill;
    }
}
