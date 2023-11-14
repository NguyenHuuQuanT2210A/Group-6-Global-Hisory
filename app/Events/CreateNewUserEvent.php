<?php

namespace App\Events;

use App\Models\Event;
use App\Models\User_Event;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class CreateNewUserEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user_event;
    /**
     * Create a new event instance.
     */
    public function __construct(User_Event $user_event)
    {
        $this->user_event = $user_event;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
