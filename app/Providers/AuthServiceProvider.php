<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Customer;
use App\Policies\CustomerPolicy;
use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Customer::class => CustomerPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::before(function ($user) {
            return $user->isSuperAdmin() ? true : null;
        });
    }
}
