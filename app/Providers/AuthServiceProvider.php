<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\User' => 'App\Policies\UserPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('index-userManager',function($user,$object){
            return $user->isSuperAdmin() || $user->id===$object->id ;
        });

        Gate::define('index-parking',function($userObject){
            $user = \Auth::user();
            return $user->isOwner()  ;
        });

        Gate::define('index-log',function($userObject){
            $user = \Auth::user();
            return $user->isSuperAdmin() ;
        });




    }
}
