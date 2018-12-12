<?php

namespace App\Providers;

use App\Models\Fax;
use App\Policies\FaxPolicy;
use App\Models\Bank;
use App\Policies\BankPolicy;
use App\Models\Type;
use App\Policies\TypePolicy;
use App\Models\Unit;
use App\Policies\UnitPolicy;
use App\Models\Item;
use App\Policies\ItemPolicy;
use App\Models\Amel;
use App\Policies\AmelPolicy;
use App\Models\Email;
use App\Policies\EmailPolicy;
use App\Models\Phone;
use App\Policies\PhonePolicy;
use App\Models\Level;
use App\Policies\LevelPolicy;
use App\Models\Status;
use App\Policies\StatusPolicy;
use App\Models\School;
use App\Policies\SchoolPolicy;
use App\Models\Address;
use App\Policies\AddressPolicy;
use App\Models\License;
use App\Policies\LicensePolicy;
use App\Models\Journal;
use App\Policies\JournalPolicy;
use App\Models\Version;
use App\Policies\VersionPolicy;
use App\Models\Website;
use App\Policies\WebsitePolicy;
use App\Models\Category;
use App\Policies\CategoryPolicy;
use App\Models\Currency;
use App\Policies\CurrencyPolicy;
use App\Models\Aircraft;
use App\Policies\AircraftPolicy;
use App\Models\Employee;
use App\Policies\EmployeePolicy;
use App\Models\TaskCard;
use App\Policies\TaskCardPolicy;
use App\Models\Customer;
use App\Policies\CustomerPolicy;
use App\Models\Document;
use App\Policies\DocumentPolicy;
use App\Models\Language;
use App\Policies\LanguagePolicy;
use App\Models\Supplier;
use App\Policies\SupplierPolicy;
use App\Models\Quotation;
use App\Policies\QuotationPolicy;
use App\Models\Department;
use App\Policies\DepartmentPolicy;
use App\Models\BankAccount;
use App\Policies\BankAccountPolicy;
use App\Models\WorkPackage;
use App\Policies\WorkPackagePolicy;
use App\Models\Manufacturer;
use App\Policies\ManufacturerPolicy;
use App\Models\Certification;
use App\Policies\CertificationPolicy;
use App\Models\GeneralLicense;
use App\Policies\GeneralLicensePolicy;
use App\Models\Pivots\EmployeeLicense;
use App\Policies\EmployeeLicensePolicy;
use App\Models\OTRCertification;
use App\Policies\OTRCertificationPolicy;
use App\Models\MaintenanceCycle;
use App\Policies\MaintenanceCyclePolicy;
use App\Models\Pivots\CertificationEmployee;
use App\Policies\CertificationEmployeePolicy;

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
        Fax::class => FaxPolicy::class,
        Bank::class => BankPolicy::class,
        Type::class => TypePolicy::class,
        Unit::class => UnitPolicy::class,
        Item::class => ItemPolicy::class,
        Amel::class => AmelPolicy::class,
        Email::class => EmailPolicy::class,
        Phone::class => PhonePolicy::class,
        Level::class => LevelPolicy::class,
        Status::class => StatusPolicy::class,
        School::class => SchoolPolicy::class,
        Address::class => AddressPolicy::class,
        License::class => LicensePolicy::class,
        Journal::class => JournalPolicy::class,
        Version::class => VersionPolicy::class,
        Website::class => WebsitePolicy::class,
        Category::class => CategoryPolicy::class,
        Currency::class => CurrencyPolicy::class,
        Aircraft::class => AircraftPolicy::class,
        Employee::class => EmployeePolicy::class,
        TaskCard::class => TaskCardPolicy::class,
        Customer::class => CustomerPolicy::class,
        Document::class => DocumentPolicy::class,
        Language::class => LanguagePolicy::class,
        Supplier::class => SupplierPolicy::class,
        Quotation::class => QuotationPolicy::class,
        Department::class => DepartmentPolicy::class,
        BankAccount::class => BankAccountPolicy::class,
        WorkPackage::class => WorkPackagePolicy::class,
        Manufacturer::class => ManufacturerPolicy::class,
        Certification::class => CertificationPolicy::class,
        GeneralLicense::class => GeneralLicensePolicy::class,
        EmployeeLicense::class => EmployeeLicensePolicy::class,
        OTRCertification::class => OTRCertificationPolicy::class,
        MaintenanceCycle::class => MaintenanceCyclePolicy::class,
        CertificationEmployee::class => CertificationEmployeePolicy::class,
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
