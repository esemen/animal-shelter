<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdoptionApplicationCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public Application $application;

    /**
     * Create a new message instance.
     *
     * @param Application $application
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Your application has been received')
            ->markdown('emails.applications.adoption-created', [
            'url' => route('application.show', ['application' => $this->application])
        ]);
    }
}
