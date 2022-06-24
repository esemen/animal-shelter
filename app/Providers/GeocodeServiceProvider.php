<?php

namespace App\Providers;

use App\Services\Geocode;
use Illuminate\Support\ServiceProvider;

class GeocodeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(Geocode::class, function () {
            return new Geocode(config('mtar.google_api_key'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
