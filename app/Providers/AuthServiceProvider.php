<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\role;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('admin', function (User $user) {
            return $user->haspermission('admin');
        });
        Gate::define('ajouter les courriers', function (User $user) {
            return $user->haspermission('ajouter les courriers');
        });

        Gate::define('modifier les courriers', function (User $user) {
            return $user->haspermission('modifier les courriers');
        });

        Gate::define('supprimer les courriers', function (User $user) {
            return $user->haspermission('supprimer les courriers');
        });

        Gate::define('déstocker les courriers', function (User $user) {
            return $user->haspermission('déstocker les courriers');
        });

        Gate::define('voir les courriers', function (User $user) {
            return $user->haspermission('voir les courriers');
        });
Gate::after(function (User $user,) {
    return $user->hasroles("admin");
});
}
}
