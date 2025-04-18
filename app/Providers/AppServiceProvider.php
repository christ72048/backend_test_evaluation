<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Vehicule;
use App\Models\Intervention;
use App\Policies\UserPolicy;
use App\Policies\VehiculePolicy;
use App\Policies\InterventionPolicy;
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
        Vehicule::class => VehiculePolicy::class,
        Intervention::class => InterventionPolicy::class,
    ];
    
    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Définir des gates pour les rôles
        Gate::define('admin', function (User $user) {
            return $user->hasRole('admin');
        });

        Gate::define('manager', function (User $user) {
            return $user->hasRole('manager');
        });

        Gate::define('user', function (User $user) {
            return $user->hasRole('user');
        });
    }
}