<?php

namespace App\Events;

use App\Models\Vetter;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class VetterApplicationApproved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Vetter $application;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Vetter $application)
    {
        $this->application = $application;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
//        return new PrivateChannel('channel-name');
    }
}
