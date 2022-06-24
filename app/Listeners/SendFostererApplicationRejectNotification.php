<?php

namespace App\Listeners;

use App\Events\FostererApplicationRejected;
use App\Mail\FostererApplicationRejectedMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendFostererApplicationRejectNotification
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
     * @param FostererApplicationRejected $event
     * @return void
     */
    public function handle(FostererApplicationRejected $event)
    {
        $user = $event->user;

        if ($user instanceof MustVerifyEmail && $user->hasVerifiedEmail()) {
            Mail::to($user)
                ->send(new FostererApplicationRejectedMail());
        }
    }
}
