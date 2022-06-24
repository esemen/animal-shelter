<?php

namespace App\Listeners;

use App\Events\HomeCheckAssigned;
use App\Models\ApplicationStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetApplicationStatusAfterHomeCheckAssigned
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  HomeCheckAssigned  $event
     * @return void
     */
    public function handle(HomeCheckAssigned $event)
    {
        $app = $event->homeCheck->application;

        $appStatus = ApplicationStatus::firstWhere('slug','needs-hv');

        $app->status()->associate($appStatus)->save();
    }
}
