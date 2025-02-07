<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use \Gate;
use \DateTime;

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
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdult', function ($user){
            
            $hoy = new DateTime("now");
            $fecha_nacimiento = new DateTime($user->fecha_nacimiento);
            $diff = $hoy->diff($fecha_nacimiento);
            
            return $diff->y >= 18;
        });
    

    }

    


}
