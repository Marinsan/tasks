<?php

namespace App\Events;

use App\Log;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Changelog implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $log;
    public $user;

    /**
     * Create a new event instance.
     *
     * @param Log $log
     * @param $user
     */
    public function __construct(Log $log, $user)
    {
        $this->user = $user;
        $this->log = $log;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('App.Log');
    }
}
