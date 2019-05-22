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
        Models\User::class => Policies\UserPolicy::class,
        Models\Type::class => Policies\TypePolicy::class,
        Models\Unit::class => Policies\UnitPolicy::class,
        Models\Item::class => Policies\ItemPolicy::class,
        Models\Amel::class => Policies\AmelPolicy::class,
        Models\Zone::class => Policies\ZonePolicy::class,
        Models\Email::class => Policies\EmailPolicy::class,
        Models\Phone::class => Policies\PhonePolicy::class,
        Models\Level::class => Policies\LevelPolicy::class,
        Models\Price::class => Policies\PricePolicy::class,
        Models\Status::class => Policies\StatusPolicy::class,
        Models\School::class => Policies\SchoolPolicy::class,
        Models\Access::class => Policies\AccessPolicy::class,
        Models\Vendor::class => Policies\VendorPolicy::class,
        Models\Repeat::class => Policies\RepeatPolicy::class,
        Models\Address::class => Policies\AddressPolicy::class,
        Models\License::class => Policies\LicensePolicy::class,
        Models\Journal::class => Policies\JournalPolicy::class,
        Models\Version::class => Policies\VersionPolicy::class,
        Models\Website::class => Policies\WebsitePolicy::class,
        Models\Project::class => Policies\ProjectPolicy::class,
        Models\JobCard::class => Policies\JobCardPolicy::class,
        Models\Station::class => Policies\StationPolicy::class,
        Models\Category::class => Policies\CategoryPolicy::class,
        Models\Currency::class => Policies\CurrencyPolicy::class,
        Models\Aircraft::class => Policies\AircraftPolicy::class,
        Models\Employee::class => Policies\EmployeePolicy::class,
        Models\TaskCard::class => Policies\TaskCardPolicy::class,
        Models\Customer::class => Policies\CustomerPolicy::class,
        Models\Document::class => Policies\DocumentPolicy::class,
        Models\Language::class => Policies\LanguagePolicy::class,
        Models\Quotation::class => Policies\QuotationPolicy::class,
        Models\Threshold::class => Policies\ThresholdPolicy::class,
        Models\Department::class => Policies\DepartmentPolicy::class,
        Models\WorkPackage::class => Policies\WorkPackagePolicy::class,
        Models\Manufacturer::class => Policies\ManufacturerPolicy::class,
        Models\Certification::class => Policies\CertificationPolicy::class,
        Models\EOInstruction::class => Policies\EOInstructionPolicy::class,
        Models\PurchaseOrder::class => Policies\PurchaseOrderPolicy::class,
        Models\GoodsReceived::class => Policies\GoodsReceivedPolicy::class,
        Models\GeneralLicense::class => Policies\GeneralLicensePolicy::class,
        Models\EmployeeLicense::class => Policies\EmployeeLicensePolicy::class,
        Models\PurchaseRequest::class => Policies\PurchaseRequestPolicy::class,
        Models\OTRCertification::class => Policies\OTRCertificationPolicy::class,
        Models\CertificationEmployee::class => Policies\CertificationEmployeePolicy::class,
        Models\Pivots\ProjectWorkpackage::class => Policies\Pivots\ProjectWorkpackagePolicy::class,
        Models\Pivots\ProjectWorkpackageEngineer::class => Policies\Pivots\ProjectWorkpackageEngineer::class,
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
