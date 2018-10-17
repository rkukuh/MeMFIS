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
use App\Models\Note;
use App\Policies\NotePolicy;
use App\Models\Email;
use App\Policies\EmailPolicy;
use App\Models\Phone;
use App\Policies\PhonePolicy;
use App\Models\Level;
use App\Policies\LevelPolicy;
use App\Models\Status;
use App\Policies\StatusPolicy;
use App\Models\Address;
use App\Policies\AddressPolicy;
use App\Models\License;
use App\Policies\LicensePolicy;
use App\Models\Currency;
use App\Policies\CurrencyPolicy;
use App\Models\Aircraft;
use App\Policies\AircraftPolicy;
use App\Models\Employee;
use App\Policies\EmployeePolicy;
use App\Models\Department;
use App\Policies\DepartmentPolicy;
use App\Models\AmeLicense;
use App\Policies\AmeLicensePolicy;
use App\Models\BankAccount;
use App\Policies\BankAccountPolicy;
use App\Models\Manufacturer;
use App\Policies\ManufacturerPolicy;
use App\Models\GeneralLicense;
use App\Policies\GeneralLicensePolicy;
use App\Models\Pivots\EmployeeLicense;
use App\Policies\EmployeeLicensePolicy;

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
        Note::class => NotePolicy::class,
        Email::class => EmailPolicy::class,
        Phone::class => PhonePolicy::class,
        Level::class => LevelPolicy::class,
        Status::class => StatusPolicy::class,
        Address::class => AddressPolicy::class,
        License::class => LicensePolicy::class,
        Currency::class => CurrencyPolicy::class,
        Aircraft::class => AircraftPolicy::class,
        Employee::class => EmployeePolicy::class,
        Department::class => DepartmentPolicy::class,
        AmeLicense::class => AmeLicensePolicy::class,
        BankAccount::class => BankAccountPolicy::class,
        Manufacturer::class => ManufacturerPolicy::class,
        GeneralLicense::class => GeneralLicensePolicy::class,
        EmployeeLicense::class => EmployeeLicensePolicy::class,
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
