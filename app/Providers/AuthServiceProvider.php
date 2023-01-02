<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        //
        Gate::define('checklogin', 'App\Policies\Policy@checklogin');
        Gate::define('checkmember', 'App\Policies\Policy@checkmember');
        Gate::define('supplier-permission', 'App\Policies\Policy@supplier');
        Gate::define('admin-permission', 'App\Policies\Policy@admin');
    }
}
