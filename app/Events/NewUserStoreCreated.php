<?php

namespace App\Events;

use App\Models\UserStore;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewUserStoreCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public UserStore $userStore;

    /**
     * Create a new event instance.
     */
    public function __construct(UserStore $userStore)
    {
        $this->userStore = $userStore;
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
