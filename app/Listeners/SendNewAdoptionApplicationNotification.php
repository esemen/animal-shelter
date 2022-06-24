<?php

namespace App\Listeners;

use App\Events\AdoptionApplicationCreated;
use App\Mail\AdoptionApplicationCreatedMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendNewAdoptionApplicationNotification
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
     * @param  AdoptionApplicationCreated  $event
     * @return void
     */
    public function handle(AdoptionApplicationCreated $event)
    {
        $user = $event->application->user;

        if ($user instanceof MustVerifyEmail && $user->hasVerifiedEmail()) {
            Mail::to($user)
                ->send(new AdoptionApplicationCreatedMail($event->application));
        }
    }
}
