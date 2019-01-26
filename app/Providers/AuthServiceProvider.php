<?php

namespace App\Providers;

use App\Models;
use App\Policies;
use Illuminate\Support\Facades\Gate;
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
        Models\Zoen::class => Policies\ZoenPolicy::class,
        Models\Email::class => Policies\EmailPolicy::class,
        Models\Phone::class => Policies\PhonePolicy::class,
        Models\Level::class => Policies\LevelPolicy::class,
        Models\Status::class => Policies\StatusPolicy::class,
        Models\School::class => Policies\SchoolPolicy::class,
        Models\Access::class => Policies\AccessPolicy::class,
        Models\Address::class => Policies\AddressPolicy::class,
        Models\License::class => Policies\LicensePolicy::class,
        Models\Journal::class => Policies\JournalPolicy::class,
        Models\Version::class => Policies\VersionPolicy::class,
        Models\Website::class => Policies\WebsitePolicy::class,
        Models\Project::class => Policies\ProjectPolicy::class,
        Models\Category::class => Policies\CategoryPolicy::class,
        Models\Currency::class => Policies\CurrencyPolicy::class,
        Models\Aircraft::class => Policies\AircraftPolicy::class,
        Models\Employee::class => Policies\EmployeePolicy::class,
        Models\TaskCard::class => Policies\TaskCardPolicy::class,
        Models\Customer::class => Policies\CustomerPolicy::class,
        Models\Document::class => Policies\DocumentPolicy::class,
        Models\Language::class => Policies\LanguagePolicy::class,
        Models\Supplier::class => Policies\SupplierPolicy::class,
        Models\Quotation::class => Policies\QuotationPolicy::class,
        Models\Department::class => Policies\DepartmentPolicy::class,
        Models\WorkPackage::class => Policies\WorkPackagePolicy::class,
        Models\Manufacturer::class => Policies\ManufacturerPolicy::class,
        Models\Certification::class => Policies\CertificationPolicy::class,
        Models\EOInstruction::class => Policies\EOInstructionPolicy::class,
        Models\GeneralLicense::class => Policies\GeneralLicensePolicy::class,
        Models\EmployeeLicense::class => Policies\EmployeeLicensePolicy::class,
        Models\OTRCertification::class => Policies\OTRCertificationPolicy::class,
        Models\MaintenanceCycle::class => Policies\MaintenanceCyclePolicy::class,
        Models\CertificationEmployee::class => Policies\CertificationEmployeePolicy::class,
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
