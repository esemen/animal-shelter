<?php

namespace App\Listeners;

use App\Events\VetterApplicationApproved;
use App\Mail\VetterApplicationApprovedMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendVetterApplicationApproveNotification
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
     * @param VetterApplicationApproved $event
     * @return void
     */
    public function handle(VetterApplicationApproved $event)
    {
        $user = $event->application->user;

        if ($user instanceof MustVerifyEmail && $user->hasVerifiedEmail()) {
            Mail::to($user)
                ->send(new VetterApplicationApprovedMail());
        }
    }
}
