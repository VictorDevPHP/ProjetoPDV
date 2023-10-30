<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        Gate::define('adm', function ($user) {
            return $user->profile == 'adm' ? true : false;
        });

        Gate::define('gerente', function ($user){
            if ($user->profile == 'adm' || $user->profile == 'gerente') {
                return true;
            }else{
                return false;
            }
        });
    }

}