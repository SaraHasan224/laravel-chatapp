<?php

namespace App\Events;

use App\Route;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CoordsLogged implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $routes;
    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct(Route $routes)
    {
        $this->routes = $routes;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('routes.' . $this->routes->user->id);
    }

    public function broadcastWith()
    {
        return ['routes' => $this->routes];
    }
}
