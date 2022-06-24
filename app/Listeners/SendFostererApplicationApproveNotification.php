<?php

namespace App\Listeners;

use App\Events\FostererApplicationApproved;
use App\Mail\FostererApplicationApprovedMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendFostererApplicationApproveNotification
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
     * @param FostererApplicationApproved $event
     * @return void
     */
    public function handle(FostererApplicationApproved $event)
    {
        $user = $event->application->user;

        if ($user instanceof MustVerifyEmail && $user->hasVerifiedEmail()) {
            Mail::to($user)
                ->send(new FostererApplicationApprovedMail());
        }
    }
}
