<?php

namespace App\Listeners;

use App\Events\FostererApplicationCreated;
use App\Mail\FostererApplicationCreated as FostererApplicationCreatedMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendNewFostererApplicationNotification
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
     * @param  FostererApplicationCreated  $event
     * @return void
     */
    public function handle(FostererApplicationCreated $event)
    {
        $user = $event->user;

        if ($user instanceof MustVerifyEmail && $user->hasVerifiedEmail()) {
            Mail::to($user)
                ->send(new FostererApplicationCreatedMail($user));
        }

    }
}
