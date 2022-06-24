<?php

namespace App\Mail;

use App\Models\Fosterer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FostererApplicationCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param Fosterer fosterer
     */
    public function __construct()
    {
        $this->fosterer = auth()->user();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.applications.fosterer-created', [
            'url' => route('application.show', ['application' => $this->fosterer])
        ]);
    }
}
