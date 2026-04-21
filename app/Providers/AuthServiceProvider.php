<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        \App\Models\Vehicle::class => \App\Policies\VehiclePolicy::class,
        \App\Models\Invoice::class => \App\Policies\InvoicePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Define gate for admin access
        Gate::define('admin-access', function (User $user) {
            return $user->isAdmin();
        });

        // Define gate for technician access
        Gate::define('technician-access', function (User $user) {
            return $user->isTechnician();
        });

        // Define gate for customer access
        Gate::define('customer-access', function (User $user) {
            return $user->isCustomer();
        });
    }
}
