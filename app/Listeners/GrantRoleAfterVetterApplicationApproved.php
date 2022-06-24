<?php

namespace App\Listeners;

use App\Events\VetterApplicationApproved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GrantRoleAfterVetterApplicationApproved
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
     * @param  VetterApplicationApproved  $event
     * @return void
     */
    public function handle(VetterApplicationApproved $event)
    {
        $user = $event->application->user;

        $user->assignRole('Vet & Spay/Neuter Team');
    }
}
