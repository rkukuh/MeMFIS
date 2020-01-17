<?php

namespace App\Models;

use Carbon\Carbon;
use App\MemfisModel;

class JobCard extends MemfisModel
{
    protected $table = 'jobcards';

    protected $fillable = [
        'number',
        'jobcardable_type',
        'jobcardable_id',
        'quotation_id',
        'is_rii',
        'is_mandatory',
        'station_id',
        'additionals',
        'origin_quotation',
        'origin_jobcardable',
        'origin_jobcardable_items',
        'origin_jobcard_helpers',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all JobCard's approvals.
     * See: Approvals's approvable() method for the inverse
     *
     * @return mixed
     */
    public function approvals()
    {
        return $this->morphMany(Approval::class, 'approvable');
    }

    /**
     * One-to-Many: A Job Card may have none or many Defect Card.
     *
     * This function will retrieve all the Defect Cards of a given Job Card.
     * See: DefectCard's jobcard() method for the inverse
     *
     * @return mixed
     */
    public function defectcards()
    {
        return $this->hasMany(DefectCard::class, 'jobcard_id');
    }

    /**
     * Many-to-Many: A JobCard may have zero or many helper.
     *
     * This function will retrieve all the helpers of a JobCard.
     * See: Employee's jobcards() method for the inverse
     *
     * @return mixed
     */
    public function helpers()
    {
        return $this->belongsToMany(Employee::class, 'employee_jobcard', 'jobcard_id', 'employee_id')
                    ->withPivot(
                        'additionals'
                    )
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
     * Polymorphic: An entity can have zero or many jobcards.
     *
     * This function will get all of the owning jobcardable models.
     * See:
     * - EOInstruction's jobcards() method for the inverse
     * - TaskCard's jobcards() method for the inverse
     *
     * @return mixed
     */
    public function jobcardable()
    {
        return $this->morphTo();
    }

    /**
     * One-to-Many: A jobcard may have zero or many logbook.
     *
     * This function will retrieve all logbooks of a jobcard.
     * See: Type's logbook_jobcards() method for the inverse
     *
     * @return mixed
     */
    public function logbooks()
    {
        return $this->belongsToMany(Type::class, 'jobcard_logbooks', 'jobcard_id', 'logbook_id')
                    ->withTimestamps();
    }

    /**
     * Polymorphic: An entity can have zero or many progresses.
     *
     * This function will get all JobCard's progresses.
     * See: Progress's progressable() method for the inverse
     *
     * @return mixed
     */
    public function progresses()
    {
        return $this->morphMany(Progress::class, 'progressable');
    }

    /**
     * One-to-Many: A jobcard must related to a quotation
     *
     * This function will retrieve the quotation of a jobcard.
     * See: Quotation's jobcards() method for the inverse
     *
     * @return mixed
     */
    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    /**
     * One-to-Many: A jobcard may related to an A/C station
     *
     * This function will retrieve the A/C station of a jobcard.
     * See: Station's jobcards() method for the inverse
     *
     * @return mixed
     */
    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    /**
     * Polymorphic: An entity can have zero or many statuses.
     *
     * This function will get all of the jobcard's statuses.
     * See: Status's statusable() method for the inverse
     *
     * @return mixed
     */
    public function statuses()
    {
        return $this->morphMany(Status::class, 'statusable');
    }

    /*************************************** ACCESSOR ****************************************/

    /**
     * Get the actual manhour jobcard.
     *
     * @return string
     */
    public function getActualManhourAttribute()
    {
        $statuses = Status::ofJobCard()->get();
        foreach($this->helpers as $helper){
            $helper->userID .= $helper->user->id;
        }

        $manhours = 0;

        foreach($this->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
            $date1 = null;
            foreach($values as $value){
                // dump($statuses->where('id',$value->status_id)->first()->code);
                if($statuses->where('id',$value->status_id)->first()->code <> "open" and $statuses->where('id',$value->status_id)->first()->code <> "released" and $statuses->where('id',$value->status_id)->first()->code <> "rii-released"){
                    if($this->helpers->where('userID',$key)->first() == null){
                        if($date1 <> null){
                            $t1 = Carbon::parse($date1);
                            $t2 = Carbon::parse($value->created_at);
                            $diff = $t1->diffInSeconds($t2);
                            $manhours += + $diff;
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
                                $manhours_break += $diff;
                            }
                        }
                    }
                }
            }
        }

        $manhours_break = $manhours_break/3600;
        $actual_manhours = number_format($manhours-$manhours_break, 2);

        return $actual_manhours;
    }

    /**
     * Get the last status inserted for jobcard.
     *
     * @return string
     */
    public function getStatusNameAttribute()
    {
        $status = Status::ofJobCard()->find($this->progresses->last()->status_id);
        
        return $status->name;
    }
    
}
