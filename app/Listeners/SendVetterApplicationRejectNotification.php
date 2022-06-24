<?php

namespace App\Listeners;

use App\Events\VetterApplicationRejected;
use App\Mail\VetterApplicationRejectedMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendVetterApplicationRejectNotification
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
     * @param VetterApplicationRejected $event
     * @return void
     */
    public function handle(VetterApplicationRejected $event)
    {
        $user = $event->user;

        if ($user instanceof MustVerifyEmail && $user->hasVerifiedEmail()) {
            Mail::to($user)
                ->send(new VetterApplicationRejectedMail());
        }
    }
}
