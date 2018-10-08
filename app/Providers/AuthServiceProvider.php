<?php

namespace App\Providers;

use App\Models\Fax;
use App\Policies\FaxPolicy;
use App\Models\Bank;
use App\Policies\BankPolicy;
use App\Models\Type;
use App\Policies\TypePolicy;
use App\Models\Email;
use App\Policies\EmailPolicy;
use App\Models\Phone;
use App\Policies\PhonePolicy;
use App\Models\Status;
use App\Policies\StatusPolicy;
use App\Models\Currency;
use App\Policies\CurrencyPolicy;
use App\Models\Department;
use App\Policies\DepartmentPolicy;
use App\Models\BankAccount;
use App\Policies\BankAccountPolicy;

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
        Email::class => EmailPolicy::class,
        Phone::class => PhonePolicy::class,
        Status::class => StatusPolicy::class,
        Currency::class => CurrencyPolicy::class,
        Department::class => DepartmentPolicy::class,
        BankAccount::class => BankAccountPolicy::class,
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
