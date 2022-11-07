<?php

namespace App\Providers;

use App\Models\Owner;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;


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
            return $user->role == 1;
        });

        Gate::define('owner', function (User $user) {
            return $user->role == 2;
        });

        Gate::define('user', function (User $user) {
            return $user->role == 0;
        });
    }
}