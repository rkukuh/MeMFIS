<?php

namespace App\Models;

use App\MemfisModel;
use App\Models\Pivots\ProjectWorkPackage;

class Project extends MemfisModel
{
    protected $fillable = [
        'code',
        'parent_id',
        'title',
        'customer_id',
        'aircraft_id',
        'no_wo',
        'aircraft_register',
        'aircraft_sn',
        'data_defectcard',
        'data_htcrr',
        'origin_parent_project',
        'origin_project_workpackages',
        'origin_project_workpackage_engineers',
        'origin_project_workpackage_facilities',
        'origin_project_workpackage_manhours',
        'origin_project_workpackage_taskcards',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A project must have an aircraft
     *
     * This function will retrieve the aircraft of a project.
     * See: Aircraft's projects() method for the inverse
     *
     * @return mixed
     */
    public function aircraft()
    {
        return $this->belongsTo(Aircraft::class);
    }

    /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all Project's approvals.
     * See: Approvals's approvable() method for the inverse
     *
     * @return mixed
     */
    public function approvals()
    {
        return $this->morphMany(Approval::class, 'approvable');
    }

    /**
     * M-M Polymorphic: A branch can be applied to many entities.
     *
     * This function will get all the branches that are applied to a given project.
     * See: Branch's projects() method for the inverse
     *
     * @return mixed
     */
    public function branches()
    {
        return $this->morphToMany(Branch::class, 'branchable');
    }

    /**
     * One-to-Many (self-join): A Project may have none or many sub-project.
     *
     * This function will retrieve the sub-project of a project, if any.
     * See: Project's parent() method for the inverse
     *
     * @return mixed
     */
    public function childs()
    {
        return $this->hasMany(Project::class, 'parent_id');
    }

    /**
     * One-to-Many: A project must have a customer
     *
     * This function will retrieve the customer of a project.
     * See: Customer's projects() method for the inverse
     *
     * @return mixed
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * One-to-Many: A Project (additional) may have zero or many Defect Cards.
     *
     * This function will retrieve all the Defect Cards of a given project (additional).
     * See: DefectCard's project_additional() method for the inverse
     *
     * @return mixed
     */
    public function defectcards()
    {
        return $this->hasMany(DefectCard::class, 'project_additional_id');
    }

    /**
     * One-to-Many: An HT/CRR may have none or many project.
     *
     * This function will retrieve all the HT/CRRs of a given Project.
     * See: HtCrr's project() method for the inverse
     *
     * @return mixed
     */
    public function htcrrs()
    {
        return $this->hasMany(HtCrr::class);
    }

    /**
     * Many-to-Many: A project may have one or many item.
     *
     * This function will retrieve all the items of a project.
     * See: Item's projects() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->belongsToMany(Item::class)
                    ->withPivot(
                        'quantity',
                        'unit_id',
                        'note'
                    )
                    ->withTimestamps();
    }

    /**
     * One-to-Many (self-join): A Project may have none or many sub-project.
     *
     * This function will retrieve the parent of a sub-project.
     * See: Project's childs() method for the inverse
     *
     * @return mixed
     */
    public function parent()
    {
        return $this->belongsTo(Project::class, 'parent_id');
    }

    /**
     * Polymorphic: An entity can have zero or many progresses.
     *
     * This function will get all Project's progresses.
     * See: Progress's progressable() method for the inverse
     *
     * @return mixed
     */
    public function progresses()
    {
        return $this->morphMany(Progress::class, 'progressable');
    }

    /**
     * Polymorphic: An entity can have zero or many purchase requests.
     *
     * This function will get all Project's purchase requests.
     * See: PurchaseRequest's purchase_requestable() method for the inverse
     *
     * @return mixed
     */
    public function purchase_requests()
    {
        return $this->morphMany(PurchaseRequest::class, 'purchase_requestable');
    }

    /**
     * Polymorphic: An entity can have zero or many quotations.
     *
     * This function will get all Project's quotations.
     * See: Quotation's quotationable() method for the inverse
     *
     * @return mixed
     */
    public function quotations()
    {
        return $this->morphMany(Quotation::class, 'quotationable');
    }

    /**
     * One-to-One: A Project have one RTS.
     *
     * This function will retrieve RTS of a given Project.
     * See: RTS's project() method for the inverse
     *
     * @return mixed
     */
    public function rts()
    {
        return $this->hasOne(RTS::class);
    }

    /**
     * Many-to-Many: A project may have one or many workpackage.
     *
     * This function will retrieve all the work packages of a project.
     * See: WorkPackage's projects() method for the inverse
     *
     * @return mixed
     */
    public function workpackages()
    {
        return $this->belongsToMany(WorkPackage::class, 'project_workpackage', 'project_id', 'workpackage_id')
                    ->using(ProjectWorkPackage::class)
                    ->withPivot(
                        'tat',
                        'performance_factor',
                        'total_manhours',
                        'total_manhours_with_performance_factor'
                    )
                    ->wherePivot('deleted_at', null)
                    ->withTimestamps();
    }
}
