<?php

namespace App\Providers;


use App\Models\Product;
use App\Observers\ProductObserver;
use Illuminate\Pagination\Paginator;
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
        Paginator::defaultView('vendor.pagination.bootstrap-4');
        Blade::if('admin', function (){
            return Auth::user()->isAdmin();
        });
        Product::observe(ProductObserver::class);
    }
}
