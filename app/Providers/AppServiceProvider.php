<?php

namespace App\Providers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Blade::directive('routeactive', function ($route){
            return "<?php echo \":active=request()->routeIs($route)\"; ?>";
        });
        Blade::if('admin', function (){
            return Auth::user()->isAdmin();
        });
    }
}
