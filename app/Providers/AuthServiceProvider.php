<?php

namespace App\Providers;

use App\Models;
use App\Policies;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Models\Fax::class => Policies\FaxPolicy::class,
        Models\Tax::class => Policies\TaxPolicy::class,
        Models\RTS::class => Policies\RTSPolicy::class,
        Models\User::class => Policies\UserPolicy::class,
        Models\Type::class => Policies\TypePolicy::class,
        Models\Unit::class => Policies\UnitPolicy::class,
        Models\Item::class => Policies\ItemPolicy::class,
        Models\Amel::class => Policies\AmelPolicy::class,
        Models\Zone::class => Policies\ZonePolicy::class,
        Models\BPJS::class => Policies\BPJSPolicy::class,
        Models\Bank::class => Policies\BankPolicy::class,
        Models\Email::class => Policies\EmailPolicy::class,
        Models\Phone::class => Policies\PhonePolicy::class,
        Models\Level::class => Policies\LevelPolicy::class,
        Models\Price::class => Policies\PricePolicy::class,
        Models\HtCrr::class => Policies\HtCrrPolicy::class,
        Models\Promo::class => Policies\PromoPolicy::class,
        Models\Status::class => Policies\StatusPolicy::class,
        Models\School::class => Policies\SchoolPolicy::class,
        Models\Access::class => Policies\AccessPolicy::class,
        Models\Vendor::class => Policies\VendorPolicy::class,
        Models\Repeat::class => Policies\RepeatPolicy::class,
        Models\Branch::class => Policies\BranchPolicy::class,
        Models\Benefit::class => Policies\BenefitPolicy::class,
        Models\Address::class => Policies\AddressPolicy::class,
        Models\License::class => Policies\LicensePolicy::class,
        Models\Version::class => Policies\VersionPolicy::class,
        Models\Website::class => Policies\WebsitePolicy::class,
        Models\Project::class => Policies\ProjectPolicy::class,
        Models\JobCard::class => Policies\JobCardPolicy::class,
        Models\Station::class => Policies\StationPolicy::class,
        Models\Company::class => Policies\CompanyPolicy::class,
        Models\Manhour::class => Policies\ManhourPolicy::class,
        Models\Holiday::class => Policies\HolidayPolicy::class,
        Models\Category::class => Policies\CategoryPolicy::class,
        Models\Currency::class => Policies\CurrencyPolicy::class,
        Models\Aircraft::class => Policies\AircraftPolicy::class,
        Models\Employee::class => Policies\EmployeePolicy::class,
        Models\TaskCard::class => Policies\TaskCardPolicy::class,
        Models\Customer::class => Policies\CustomerPolicy::class,
        Models\Document::class => Policies\DocumentPolicy::class,
        Models\Language::class => Policies\LanguagePolicy::class,
        Models\Facility::class => Policies\FacilityPolicy::class,
        Models\Approval::class => Policies\ApprovalPolicy::class,
        Models\Progress::class => Policies\ProgressPolicy::class,
        Models\Position::class => Policies\PositionPolicy::class,
        Models\JobTittle::class => Policies\JobTittlePolicy::class,
        Models\LeaveType::class => Policies\LeaveTypePolicy::class,
        Models\Workshift::class => Policies\WorkshiftPolicy::class,
        Models\Quotation::class => Policies\QuotationPolicy::class,
        Models\Threshold::class => Policies\ThresholdPolicy::class,
        Models\Department::class => Policies\DepartmentPolicy::class,
        Models\DefectCard::class => Policies\DefectCardPolicy::class,
        Models\Inspection::class => Policies\InspectionPolicy::class,
        Models\WorkPackage::class => Policies\WorkPackagePolicy::class,
        Models\LeavePeriod::class => Policies\LeavePeriodPolicy::class,
        Models\BankAccount::class => Policies\BankAccountPolicy::class,
        Models\Interchange::class => Policies\InterchangePolicy::class,
        Models\Manufacturer::class => Policies\ManufacturerPolicy::class,
        Models\Certification::class => Policies\CertificationPolicy::class,
        Models\EOInstruction::class => Policies\EOInstructionPolicy::class,
        Models\PurchaseOrder::class => Policies\PurchaseOrderPolicy::class,
        Models\GoodsReceived::class => Policies\GoodsReceivedPolicy::class,
        Models\GeneralLicense::class => Policies\GeneralLicensePolicy::class,
        Models\EmployeeLicense::class => Policies\EmployeeLicensePolicy::class,
        Models\PurchaseRequest::class => Policies\PurchaseRequestPolicy::class,
        Models\OTRCertification::class => Policies\OTRCertificationPolicy::class,
        Models\QuotationHtcrrItem::class => Policies\QuotationHtcrrItemPolicy::class,
        Models\CertificationEmployee::class => Policies\CertificationEmployeePolicy::class,
        Models\Pivots\ProjectWorkPackage::class => Polifcies\ProjectWorkPackagePolicy::class,
        Models\Pivots\TaskCardWorkPackage::class => Policies\TaskCardWorkPackagePolicy::class,
        Models\QuotationDefectCardItem::class => Policies\QuotationDefectCardItemPolicy::class,
        Models\Pivots\QuotationWorkPackage::class => Policies\QuotationWorkPackagePolicy::class,
        Models\QuotationWorkPackageItem::class => Policies\QuotationWorkPackageItemPolicy::class,
        Models\Pivots\PurchaseOrderItem::class => Policies\Pivots\PurchaseOrderItemPolicy::class,
        Models\ProjectWorkPackageManhour::class => Policies\ProjectWorkPackageManhourPolicy::class,
        Models\ProjectWorkPackageEngineer::class => Policies\ProjectWorkPackageEngineerPolicy::class,
        Models\ProjectWorkPackageFacility::class => Policies\ProjectWorkPackageFacilityPolicy::class,
        Models\ProjectWorkPackageTaskCard::class => Policies\ProjectWorkPackageTaskCardPolicy::class,
        Models\Pivots\EOInstructionWorkPackage::class => Policies\EOInstructionWorkPackagePolicy::class,
        Models\TaskCardWorkPackageSuccessor::class => Policies\TaskCardWorkPackageSuccessorPolicy::class,
        Models\TaskCardWorkPackagePredecessor::class => Policies\TaskCardWorkPackagePredecessorPolicy::class,
        Models\ProjectWorkPackageEOInstruction::class => Policies\ProjectWorkPackageEOInstructionPolicy::class,
        Models\QuotationWorkPackageTaskCardItem::class => Policies\QuotationWorkPackageTaskCardItemPolicy::class,
        Models\EOInstructionWorkPackageSuccessor::class => Policies\EOInstructionWorkPackageSuccessorPolicy::class,
        Models\EOInstructionWorkPackagePredecessor::class => Policies\EOInstructionWorkPackagePredecessorPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
