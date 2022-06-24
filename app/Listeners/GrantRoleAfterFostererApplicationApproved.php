<?php

namespace App\Listeners;

use App\Events\FostererApplicationApproved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GrantRoleAfterFostererApplicationApproved
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
     * @param  FostererApplicationApproved  $event
     * @return void
     */
    public function handle(FostererApplicationApproved $event)
    {
        $user = $event->application->user;

        $user->assignRole('Home Check & Foster Team');
    }
}
