<?php

namespace App\Models;

use App\User;
use App\MemfisModel;
use App\Models\Pivots\EmployeeLicense;

class Employee extends MemfisModel
{
    protected $fillable = [
        'code',
        'user_id',
        'first_name',
        'last_name',
        'dob',
        'dob_place',
        'gender',
        'religion',
        'marital_status',
        'nationality'
    ];


    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An employee can have zero or many addresses.
     *
     * This function will get all of the employee's addresses.
     * See: Address' addressable() method for the inverse
     *
     * @return mixed
     */
    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    /**
     * One-Way: An employee may have zero or many AME Licenses (by DGCA).
     *
     * @return mixed
     */
    public function amels_dgca()
    {
        return $this->hasMany(EmployeeLicense::class)
                    ->where('license_id', License::ofAMELDGCA()->first()->id);
    }

    /**
     * One-to-Many: An approval (of anything) may have one approver.
     *
     * This function will retrieve all the approvals (of anything) of an employee.
     * See: Approval's approvedBy() method for the inverse
     *
     * @return mixed
     */
    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }

    /**
     * One-to-Many: An HTCRR may have one remover / installer.
     *
     * This function will retrieve all the HTCRRs of a given remover / installer.
     * See: HtCrr's conductedBy() method for the inverse
     *
     * @return mixed
     */
    public function conducted_htcrrs()
    {
        return $this->hasMany(HtCrr::class, 'conducted_by');
    }

    /**
     * Many-to-Many: A Defect Card may have zero or many helper.
     *
     * This function will retrieve all the Defect Cards of a helper.
     * See: DefectCard's helpers() method for the inverse
     *
     * @return mixed
     */
    public function defectcards()
    {
        return $this->belongsToMany(DefectCard::class, 'defectcard_employee', 'employee_id', 'defectcard_id')
                    ->withTimestamps();;
    }

    /**
     * Polymorphic: An employee can have zero or many documents.
     *
     * This function will get all of the employee's documents.
     * See: Document's documentable() method for the inverse
     *
     * @return mixed
     */
    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    /**
     * Polymorphic: An employee can have zero or many emails.
     *
     * This function will get all of the employee's emailable.
     * See: Email's emailable() method for the inverse
     *
     * @return mixed
     */
    public function emails()
    {
        return $this->morphMany(Email::class, 'emailable');
    }

    /**
     * Polymorphic: An employee can have zero or many faxes.
     *
     * This function will get all of the employee's faxable.
     * See: Fax's faxable() method for the inverse
     *
     * @return mixed
     */
    public function faxes()
    {
        return $this->morphMany(Fax::class, 'faxable');
    }

    /**
     * One-Way: An employee may have zero or many general licenses.
     *
     * @return mixed
     */
    public function general_licenses()
    {
        return $this->hasMany(EmployeeLicense::class)
                    ->where('license_id', License::ofGeneralLicense()->first()->id);
    }

    /**
     * One-to-Many: A GRN may have one approver.
     *
     * This function will retrieve all the GRNs of an approver.
     * See: GoodsReceived's approvedBy() method for the inverse
     *
     * @return mixed
     */
    public function grn_approved()
    {
        return $this->hasMany(GoodsReceived::class, 'approved_by');
    }

    /**
     * One-to-Many: A GRN may have one employee (to receive the item).
     *
     * This function will retrieve all the GRNs of a receiver.
     * See: GoodsReceived's receivedBy() method for the inverse
     *
     * @return mixed
     */
    public function grn_received()
    {
        return $this->hasMany(GoodsReceived::class, 'received_by');
    }

    /**
     * Many-to-Many: A HTCRR may have zero or many engineer.
     *
     * This function will retrieve all the HTCRRs of a engineer.
     * See: HtCrr's helpers() method for the inverse
     *
     * @return mixed
     */
    public function htcrr_engineers()
    {
        return $this->belongsToMany(HtCrr::class, 'htcrr_engineers', 'employee_id', 'htcrr_id')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    /**
     * Many-to-Many: A HTCRR may have zero or many helper.
     *
     * This function will retrieve all the HTCRRs of a helper.
     * See: HtCrr's helpers() method for the inverse
     *
     * @return mixed
     */
    public function htcrr_helpers()
    {
        return $this->belongsToMany(HtCrr::class, 'employee_htcrr', 'employee_id', 'htcrr_id')
                    ->withTimestamps();
    }

    /**
     * One-to-Many: An HT/CRR may have one remover.
     *
     * This function will retrieve all the HT/CRRs of a given remover.
     * See: HtCrr's removedBy() method for the inverse
     *
     * @return mixed
     */
    public function htcrr_removed()
    {
        return $this->hasMany(HtCrr::class, 'removed_by');
    }

    /**
     * Many-to-Many: A JobCard may have zero or many helper.
     *
     * This function will retrieve all the JobCards of a helper.
     * See: JobCard's helpers() method for the inverse
     *
     * @return mixed
     */
    public function jobcards()
    {
        return $this->belongsToMany(JobCard::class, 'employee_jobcard', 'employee_id', 'jobcard_id')
                    ->withTimestamps();;
    }

    /**
     * One-to-Many: An inspection (of anything) may have one doer.
     *
     * This function will retrieve all the inspections (of anything) of an employee.
     * See: Inspection's inspectedBy() method for the inverse
     *
     * @return mixed
     */
    public function inspections()
    {
        return $this->hasMany(Inspection::class);
    }

    /**
     * Many-to-Many: An employee may have zero or many languages.
     *
     * This function will retrieve all the languages of an employee.
     * See: Language's employees() method for the inverse
     *
     * @return mixed
     */
    public function languages()
    {
        return $this->belongsToMany(Language::class)
                    ->withTimestamps();
    }

    /**
     * Many-to-Many: An employee may have zero or many licenses.
     *
     * This function will retrieve all the licenses of an employee.
     * See: License's employees() method for the inverse
     *
     * @return mixed
     */
    public function licenses()
    {
        return $this->belongsToMany(License::class)
                    ->using(EmployeeLicense::class)
                    ->withPivot(
                        'number',
                        'issued_at',
                        'valid_until',
                        'revoke_at'
                    )
                    ->withTimestamps();
    }

    /**
     * Polymorphic: An employee can have zero or many phones.
     *
     * This function will get all of the employee's phones.
     * See: Phone's phoneable() method for the inverse
     *
     * @return mixed
     */
    public function phones()
    {
        return $this->morphMany(Phone::class, 'phoneable');
    }

    /**
     * One-to-Many: A progress (of anything) may have one doer.
     *
     * This function will retrieve all the progress (of anything) of an employee.
     * See: Progress's progressedBy() method for the inverse
     *
     * @return mixed
     */
    public function progresses()
    {
        return $this->hasMany(Progress::class);
    }

    /**
     * One-to-Many: A purchase order may have approver.
     *
     * This function will retrieve all the purchase orders of an approver.
     * See: GoodsReceived's approvedBy() method for the inverse
     *
     * @return mixed
     */
    public function purchase_order_approved()
    {
        return $this->hasMany(PurchaseOrder::class, 'approved_by');
    }

    /**
     * One-to-Many: A purchase request may have approver.
     *
     * This function will retrieve all the purchase requests of an approver.
     * See: GoodsReceived's approvedBy() method for the inverse
     *
     * @return mixed
     */
    public function purchase_request_approved()
    {
        return $this->hasMany(PurchaseRequest::class, 'approved_by');
    }

    /**
     * Polymorphic: An employee can have zero or many websites.
     *
     * This function will get all of the employee's websites.
     * See: Phone's websiteable() method for the inverse
     */
    public function websites()
    {
        return $this->morphMany(Website::class, 'websiteable');
    }

    /**
     * Many-to-Many: An employee may have zero or many schools.
     *
     * This function will retrieve all the schools of an employee.
     * See: School's employees() method for the inverse
     *
     * @return mixed
     */
    public function schools()
    {
        return $this->belongsToMany(School::class)
                    ->withTimestamps();
    }

    /**
     * One-to-One: An Employee have one User account.
     *
     * This function will retrieve User account of a given Employee.
     * See: User's employee() method for the inverse
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
