<?php

namespace App\Listeners;

use App\Events\VetterApplicationCreated;
use App\Mail\VetterApplicationCreatedMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendVetterApplicationCreateNotification
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
     * @param VetterApplicationCreated $event
     * @return void
     */
    public function handle(VetterApplicationCreated $event)
    {
        $user = $event->application->user;

        if ($user instanceof MustVerifyEmail && $user->hasVerifiedEmail()) {
            Mail::to($user)
                ->send(new VetterApplicationCreatedMail());
        }
    }
}
