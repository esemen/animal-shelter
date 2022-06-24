<?php

namespace App\Providers;

use App\Services\Avid;
use Illuminate\Support\ServiceProvider;

class AvidServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(Avid::class, function () {
            return new Avid(config('mtar.avid.organisation'));
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
