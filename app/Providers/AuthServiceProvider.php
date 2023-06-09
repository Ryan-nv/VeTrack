<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('is-admin', function () {
            return Auth::check() && Auth::user()->role === 1;
        });
        Gate::define('is-supervisor', function () {
            return Auth::check() && Auth::user()->role === 1;
        });

        Blade::if('isAdmin', function () {
            return Auth::check() && Auth::user()->role === 1;
        });

        Blade::if('isSupervisor', function () {
            return Auth::check() && Auth::user()->role === 2;
        });
    }
}
