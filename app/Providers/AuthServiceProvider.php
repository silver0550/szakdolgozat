<?php

namespace App\Providers;

use App\Http\Enums\PasswordEnum;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Policies\UserPolicy;

use function Symfony\Component\String\b;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('SuperAdmin', function(User $user){
            return $user->email === env('SUPER_ADMIN');
        });

        Gate::define('Admin', function(User $user){
            return $user->isAdmin()->first();
        });
        
    }
}
