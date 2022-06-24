<?php

namespace App\Events;

use App\Models\HomeCheck;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class HomeCheckAssigned
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $homeCheck;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(HomeCheck $homeCheck)
    {
        $this->homeCheck = $homeCheck;
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
