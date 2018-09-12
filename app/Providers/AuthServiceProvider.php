<?php

namespace App\Providers;

use App\Models\Bank;
use App\Policies\BankPolicy;
use App\Models\Phone;
use App\Policies\PhonePolicy;
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
        Bank::class => BankPolicy::class,
        Phone::class => PhonePolicy::class,
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
