<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind("first_service_helper",function ($app) {
            dd("This is my first service container.");
        });
        app()->bind("second_service_helper",function ($app) {
            dd("This is my second service container.");
        });
        app()->bind("third_service_provider",function ($app) {
            dd("This is my third service container.");
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // data niye asbo
        // View::share('company_name', $details->company_name);

        // composer
        View::composer("*",function ($view) {
            $text = "Form composer";
            $view->with('text',$text);
        });
    }
}
