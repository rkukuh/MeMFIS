<?php

namespace App\Models;

use Carbon\Carbon;
use App\MemfisModel;

class HtCrr extends MemfisModel
{
    protected $table = 'htcrr';

    protected $fillable = [
        'code',
        'parent_id',
        'type_id',
        'project_id',
        'position',
        'serial_number',
        'item_id',
        'conducted_at',
        'conducted_by',
        'estimation_manhour',
        'is_rii',
        'manhour_total',
        'manhour_rate_id',
        'manhour_rate_amount',
        'discount_type',
        'discount_value',
        'description',
        'origin_type',
        'origin_project',
        'origin_conducted_by',
        'origin_htcrr',
        'origin_htcrr_items',
        'origin_htcrr_skills',
        'origin_htcrr_helpers',
        'origin_htcrr_engineers',
        'origin_htcrr_item_quotation',
    ];

    protected $dates = ['conducted_at'];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many (self-join): An HTCRR may have none or many sub-HTCRR.
     *
     * This function will retrieve the sub-HTCRR of an HTCRR, if any.
     * See: HtCrr's parent() method for the inverse
     *
     * @return mixed
     */
    public function childs()
    {
        return $this->hasMany(HtCrr::class, 'parent_id');
    }

    /**
     * One-to-Many: An HTCRR may have one remover / installer.
     *
     * This function will retrieve the removed / installer of an HTCRR.
     * See: Employee's conducted_htcrrs() method for the inverse
     *
     * @return mixed
     */
    public function conductedBy()
    {
        return $this->belongsTo(Employee::class, 'conducted_by');
    }

    /**
     * Many-to-Many: A HTCRR may have zero or many engineer.
     *
     * This function will retrieve all the engineers of a HTCRR.
     * See: Employee's htcrr_engineers() method for the inverse
     *
     * @return mixed
     */
    public function engineers()
    {
        return $this->belongsToMany(Employee::class, 'htcrr_engineers', 'htcrr_id', 'employee_id')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    /**
     * Many-to-Many: A HTCRR may have zero or many helper.
     *
     * This function will retrieve all the helpers of a HTCRR.
     * See: Employee's htcrr_helpers() method for the inverse
     *
     * @return mixed
     */
    public function helpers()
    {
        return $this->belongsToMany(Employee::class, 'employee_htcrr', 'htcrr_id', 'employee_id')
                    ->withTimestamps();
    }

    /**
     * One-Way: An item is an item.
     *
     * @return mixed
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * Many-to-Many: An HTCRR may have one or many item.
     *
     * This function will retrieve all the items of an HTCRR.
     * See: Item's htcrrs() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'htcrr_item', 'htcrr_id', 'item_id')
                    ->withPivot(
                        'quantity',
                        'unit_id',
                        'note'
                    )
                    ->withTimestamps();
    }

    /**
     * One-to-Many: An HT/CRR may have one manhour rate.
     *
     * This function will retrieve the manhour rate of an HT/CRR.
     * See: Manhour's htcrrs() method for the inverse
     *
     * @return mixed
     */
    public function manhour_rate()
    {
        return $this->belongsTo(Manhour::class, 'manhour_rate_id');
    }

    /**
     * One-to-Many (self-join): An HTCRR may have none or many sub-HTCRR.
     *
     * This function will retrieve the parent of a sub-HTCRR.
     * See: HtCrr's childs() method for the inverse
     *
     * @return mixed
     */
    public function parent()
    {
        return $this->belongsTo(HtCrr::class, 'parent_id');
    }

    /**
     * Polymorphic: An entity can have zero or many progresses.
     *
     * This function will get all HtCrr's progresses.
     * See: Progress's progressable() method for the inverse
     *
     * @return mixed
     */
    public function progresses()
    {
        return $this->morphMany(Progress::class, 'progressable');
    }

    /**
     * One-to-Many: An HT/CRR may have none or many project.
     *
     * This function will retrieve the project of a given HT/CRR.
     * See: Project's htcrrs() method for the inverse
     *
     * @return mixed
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * One-to-Many: An HT/CRR may have one remover.
     *
     * This function will retrieve the remover of an HT/CRR.
     * See: Employee's htcrr_removed() method for the inverse
     *
     * @return mixed
     */
    public function removedBy()
    {
        return $this->belongsTo(Employee::class, 'removed_by');
    }

    /**
     * Many-to-Many: An HTCRR may have zero or many skill.
     *
     * This function will retrieve all the skills of an HTCRR.
     * See: Type's skill_htcrrs() method for the inverse
     *
     * @return mixed
     */
    public function skills()
    {
        return $this->belongsToMany(Type::class, 'htcrr_skill', 'htcrr_id', 'skill_id')
                    ->withTimestamps();
    }

    /**
     * One-to-Many: An HTCRR may have zero or many type.
     *
     * This function will retrieve the type of an HTCRR.
     * See: Type's type_htcrrs() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /*************************************** ACCESSOR ****************************************/

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
     * Get the actual manhour.
     *
     * @return string
     */
    public function getActualManhourhAttribute()
    {
        $statuses = Status::ofHtCrr()->get();
        foreach($this->helpers as $helper){
            $helper->userID .= $helper->user->id;
        }
        $manhours_removal = 0;
        $manhours_installation = 0;
        foreach($this->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
            $date1_removal = null;
            $date1_installation = null;
            foreach($values as $value){
                if($statuses->where('id',$value->status_id)->first()->code <> "removal-open" and $statuses->where('id',$value->status_id)->first()->code <> "installation-open" and $statuses->where('id',$value->status_id)->first()->code <> "released" and $statuses->where('id',$value->status_id)->first()->code <> "rii-released"){
                    if (strpos($statuses->where('id',$value->status_id)->first()->code , "removal") !== false) {
                        if($this->helpers->where('userID',$key)->first() == null){
                            if($date1_removal <> null){
                                $t1 = Carbon::parse($date1_removal);
                                $t2 = Carbon::parse($value->created_at);
                                $diff = $t1->diffInSeconds($t2);
                                $manhours_removal = $manhours_removal + $diff;
                            }
                            $date1_removal = $value->created_at;
                        }
                    }
                    else if(strpos($statuses->where('id',$value->status_id)->first()->code , "installation") !== false){
                        if($this->helpers->where('userID',$key)->first() == null){
                            if($date1_installation <> null){
                                $t3 = Carbon::parse($date1_installation);
                                $t4 = Carbon::parse($value->created_at);
                                $diff2 = $t3->diffInSeconds($t4);
                                $manhours_installation = $manhours_installation + $diff2;
                            }
                            $date1_installation = $value->created_at;
                        }
                    }
                }
            }
        }
        $manhours_removal = $manhours_removal/3600;
        $manhours_installation = $manhours_installation/3600;
        $manhours_break_removal = 0;
        $manhours_break_installation = 0;
        foreach($this->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
            for($i=0; $i<sizeOf($values->toArray()); $i++){
                if ($statuses->where('id',$values[$i]->status_id)->first()->code == "removal-pending") {
                    if($this->helpers->where('userID',$key)->first() == null){
                        if($date1_removal <> null){
                            if($i+1 < sizeOf($values->toArray())){
                                $t5 = Carbon::parse($values[$i]->created_at);
                                $t6 = Carbon::parse($values[$i+1]->created_at);
                                $diff3 = $t5->diffInSeconds($t6);
                                $manhours_break_removal = $manhours_break_removal + $diff3;
                            }
                        }
                    }
                }
                else if($statuses->where('id',$values[$i]->status_id)->first()->code  == "installation-pending"){
                    if($this->helpers->where('userID',$key)->first() == null){
                        if($date1_installation <> null){
                            if($i+1 < sizeOf($values->toArray())){
                                $t7 = Carbon::parse($values[$i]->created_at);
                                $t8 = Carbon::parse($values[$i+1]->created_at);
                                $diff4 = $t7->diffInSeconds($t8);
                                $manhours_break_installation = $manhours_break_installation + $diff4;
                            }
                        }
                    }
                }
            }
        }
        $manhours_break_removal = $manhours_break_removal/3600;
        $manhours_break_installation = $manhours_break_installation/3600;
        $actual_manhours_removal = number_format($manhours_removal-$manhours_break_removal, 2);
        $actual_manhours_installation = number_format($manhours_installation-$manhours_break_installation, 2);
        $actual_manhours = number_format($actual_manhours_removal+$actual_manhours_installation, 2);

        return array('actual_manhours' => $actual_manhours, 'actual_manhours_removal' => $actual_manhours_removal, 'actual_manhours_installation' => $actual_manhours_installation);
    }
}
