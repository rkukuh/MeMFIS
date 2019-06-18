<?php

namespace App\Models;

use App\MemfisModel;
use App\Models\Pivots\ProjectWorkPackage;

class Project extends MemfisModel
{
    protected $fillable = [
        'code',
        'title',
        'customer_id',
        'aircraft_id',
        'no_wo',
        'aircraft_register',
        'aircraft_sn',
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
     * One-to-Many: An HT/CRR may have none or many project.
     *
     * This function will retrieve all the HT/CRRs of a given Project.
     * See: HtCrr's project() method for the inverse
     *
     * @return mixed
     */
    public function htcrr()
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
                    ->withPivot('quantity')
                    ->withTimestamps();
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
     * One-to-Many: A purchase request may have zero or one project
     *
     * This function will retrieve all the purchase requests of a project.
     * See: PurchaseRequest's project() method for the inverse
     *
     * @return mixed
     */
    public function purchase_requests()
    {
        return $this->belongsToMany(PurchaseRequest::class)
                    ->withTimestamps();
    }

    /**
     * One-to-Many: A quotation may have one project.
     *
     * This function will retrieve all the quotations of a project.
     * See: Quotation's project() method for the inverse
     *
     * @return mixed
     */
    public function quotations()
    {
        return $this->hasMany(Quotation::class);
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
                    ->withTimestamps();
    }
}
