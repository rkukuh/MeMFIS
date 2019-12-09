<?php

namespace App\Models;

use App\User;
use App\MemfisModel;
use Spatie\Tags\HasTags;
use App\Models\Pivots\EmployeeLicense;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Employee extends MemfisModel implements HasMedia
{

    use HasTags;
    use HasMediaTrait;

    protected $fillable = [
        'code',
        'user_id',
        'first_name',
        'last_name',
        'dob',
        'dob_place',
        'gender_id',
        'religion_id',
        'marital_id',
        'country_id',
        'city',
        'zip',
        'joined_date',
        'job_title_id',
        'position_id',
        'statuses_id',
        'department_id',
        'indirect_supervisor_id',
        'supervisor_id',
        'created_at',
        'updated_at'
    ];

    protected $timestamp = false;

// ----------------------------------------OVERIDE-----------------------------------------------//
    public function registerMediaCollections()
    {
        $this->addMediaCollection('id_card')
             ->singleFile();
    }
    
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
             ->width(45)
             ->height(45);
    }
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
     * One-to-Many: Many attendance corrections proposed by one employee.
     *
     * This function will retrieve all the attendance corrections of an employee.
     * See: AttendanceCorrection's employee() method for the inverse
     *
     * @return mixed
     */
    public function attendance_corrections()
    {
        return $this->hasMany(AttendanceCorrection::class);
    }

    /**
     * Polymorphic: An entity can have zero or many bank accounts.
     *
     * This function will get all Employee's bank accounts.
     * See: BankAccount's bank_accountable() method for the inverse
     *
     * @return mixed
     */
    public function bank_accounts()
    {
        return $this->morphMany(BankAccount::class, 'bank_accountable');
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
     * One-to-Many: An Employee have one Country.
     *
     * This function will retrieve Country of a given Employee.
     * See: Country's employee() method for the inverse
     *
     * @return mixed
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
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
                    ->withPivot('additionals','deleted_at')
                    ->whereNull('defectcard_employee.deleted_at')
                    ->withTimestamps();
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
     * One-to-Many: An Employee have one Gender.
     *
     * This function will retrieve Gender of a given Employee.
     * See: Type's employee_gender() method for the inverse
     *
     * @return mixed
     */
    public function gender()
    {
        return $this->belongsTo(Type::class, 'gender_id', 'id');
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
     * One-to-Many Polymorphic : An Employee may have zero or many histories
     * 
     * This function will get all of the histories from given employee.
     * See:
     * - Employee's histories() method for the inverse
     */
    public function histories()
    {
        return $this->morphMany(History::class, 'historiable');
    }

    /**
     * One-to-One: An Employee have one Jobtitle.
     *
     * This function will retrieve Job Title of a given Employee.
     * See: Jobtitle employee() method for the inverse
     *
     * @return mixed
     */
    public function job_title()
    {
        return $this->belongsTo(JobTitle::class);
    }

    /**
     * One-to-Many: Many leave proposed by one employee.
     *
     * This function will retrieve the employee proposed for a leave.
     * See: Leave's employee() method for the inverse
     *
     * @return mixed
     */
    public function leave()
    {
        return $this->hasMany(Leave::class);
    }

    /**
     * Many-to-Many: An employee may have zero or many nationalities.
     *
     * This function will retrieve all the nationalities of an employee.
     * See: Nationality's employees() method for the inverse
     *
     * @return mixed
     */
    public function nationalities()
    {
        return $this->belongsToMany(Nationality::class)
                    ->withTimestamps();
    }

    /**
     * One-to-One: An Employee have one Position.
     *
     * This function will retrieve Position of a given Employee.
     * See: Position employee() method for the inverse
     *
     * @return mixed
     */
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    /**
     * One-to-Many: An Employee have one Religion.
     *
     * This function will retrieve Religion of a given Employee.
     * See: Position employee() method for the inverse
     *
     * @return mixed
     */
    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    /**
     * One-to-One: An Employee have one employement Status.
     *
     * This function will retrieve Status of a given Employee.
     * See: Status employee() method for the inverse
     *
     * @return mixed
     */
    public function statuses()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * One-to-One: An Employee have one Department.
     *
     * This function will retrieve Department of a given Employee.
     * See: Department employee() method for the inverse
     *
     * @return mixed
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * One-to-Many: An employee may have zero or many attendance.
     *
     * This function will retrieve the employees of a attendance.
     * See: EmployeeAttendance employee() method for the inverse
     *
     * @return mixed
     */
    public function employee_attendance()
    {
        return $this->hasMany(EmployeeAttendance::class);
    }

    /**
     * One-to-Many: An Employee have one or many benefit.
     *
     * This function will retrieve benefit of a given Employee.
     * See: employee_benefit employee() method for the inverse
     *
     * @return mixed
     */
    public function employee_benefit()
    {
        return $this->hasMany(EmployeeBenefit::class);
    }

    /**
     * One-to-Many: An Employee have one or many bpjs.
     *
     * This function will retrieve bpjs of a given Employee.
     * See: employee_bpjs employee() method for the inverse
     *
     * @return mixed
     */
    public function employee_bpjs()
    {
        return $this->hasMany(EmployeeBPJS::class);
    }

    /**
     * One-to-One: An employee may have zero or one termination.
     *
     * This function will retrieve the employees of a termination.
     * See: EmployeeTermination employee() method for the inverse
     *
     * @return mixed
     */
    public function employee_termination()
    {
        return $this->hasMany(EmployeeTermination::class);
    }

    /**
     * One-to-Many: A marital status have zero or many Employees.
     *
     * This function will retrieve employees of a given Marital Status.
     * See: employee_bpjs employee() method for the inverse
     *
     * @return mixed
     */
    public function marital_status()
    {
        return $this->belongsTo(Status::class, 'marital_id');
    }

    /**
     * One-to-Many: An Employee have one or many provisions.
     *
     * This function will retrieve provisions of a given Employee.
     * See: employee_provisions employee() method for the inverse
     *
     * @return mixed
     */
    public function employee_provisions()
    {
        return $this->hasMany(EmployeeProvisions::class);
    }

    /**
     * One-to-Many (self-join): A indirect supervisor may have none or many employee
     *
     * This function will retrieve the indirect supervisor of an employee, if any.
     * See: Employee indirect_supervisor() method for the inverse
     *
     * @return mixed
     */
    public function indirect_supervisor()
    {
        return $this->belongsTo(Employee::class, 'indirect_supervisor_id');
    }

    /**
     * One-to-Many (self-join): A supervisor may have none or many employee
     *
     * This function will retrieve the supervisor of an employee, if any.
     * See: Employee supervisor() method for the inverse
     *
     * @return mixed
     */
    public function supervisor()
    {
        return $this->belongsTo(Employee::class, 'supervisor_id');
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
                    ->withPivot(
                        'additionals'
                    )
                    ->withTimestamps();
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
     * Many-to-Many: An employee may have zero or many workshift.
     *
     * This function will retrieve all the workshift of an employee.
     * See: Workshift's employee() method for the inverse
     *
     * @return mixed
     */
    public function workshifts()
    {
        return $this->belongsToMany(Workshift::class);
    }

    /**
     * One-to-Many: An employee may have zero or many schools.
     *
     * This function will retrieve all the schools of an employee.
     * See: EmployeeSchool employee() method for the inverse
     *
     * @return mixed
     */
    public function employee_school()
    {
        return $this->hasMany(EmployeeSchool::class);
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

    /**
     * One-to-Many: A Employee may have one or many history.
     *
     * This function will retrieve all the history of a given BPJS.
     * See: EmployeeHistory employee() method for the inverse
     *
     * @return mixed
     */
    public function history()
    {
        return $this->hasMany(EmployeeHistories::class);
    }
    
     /**
     * One-to-Many: A Employee may have one or many overtime data.
     *
     * This function will retrieve all the data of a given overtime id.
     * See: Overtime employee() method for the inverse
     *
     * @return mixed
     */
    public function overtime()
    {
        return $this->hasMany(Overtime::class);
    }
    
    /*************************************** ACCESSOR ****************************************/

    /**
     * Get the Employee's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        $full_name = $this->first_name." ".$this->last_name;
        
        return $full_name;
    }
}
