<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;




class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        /**
         * Rend true si l'utilisateur a le rôle "Role1"
         */
        $gate->define('isRole1', function ($user) {
            return $user->role_id == '1';
        });
        /**
         * Rend true si l'utilisateur a le rôle "Role2"
         */
        $gate->define('isRole2', function ($user) {
            return $user->role_id == '2';
        });

                /**
         * Rend true si l'utilisateur a le rôle "Role2"
         */
        $gate->define('isRole3', function ($user) {
            return $user->role_id == '3';
        });
    }
}
