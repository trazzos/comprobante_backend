<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Modules\User\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Definimos 3 roles muy basicos, pero con los cuales pueden empezar a trabajar.
        Gate::define(User::ROLE_ADMIN, function ($user) {
            return $user->role === User::ROLE_ADMIN;
        });

        Gate::define(User::ROLE_MANAGER, function ($user) {
            return $user->role === User::ROLE_MANAGER;
        });

        Gate::define(User::ROLE_USER, function ($user) {
            return $user->role === User::ROLE_USER;
        });
    }
}
