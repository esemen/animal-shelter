<?php

namespace App\Listeners;

use App\Events\HomeCheckAssessmentStored;
use App\Models\ApplicationStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetApplicationStatusAfterHomeCheckAssessment
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
     * @param  HomeCheckAssessmentStored  $event
     * @return void
     */
    public function handle(HomeCheckAssessmentStored $event)
    {
        $app = $event->homeCheck->application;

        $appStatus = ApplicationStatus::firstWhere('slug','passed-hv');

        $app->status()->associate($appStatus)->save();
    }
}
