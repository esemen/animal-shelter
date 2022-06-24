<?php

namespace App\Providers;

use App\Models\AnimalStatus;
use App\Models\ApplicationStatus;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!app()->runningInConsole()) {
            view()->share('animalStatuses', AnimalStatus::all());
            view()->share('applicationStatuses', ApplicationStatus::where('published', true)->get());
        }
        Paginator::useBootstrap();
    }
}
