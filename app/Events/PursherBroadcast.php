<?php

namespace App\Events;

use App\Models\Mensagen;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PursherBroadcast implements ShouldBroadcast
{
    public int $idAuth;
    public $message;

    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(Mensagen $message, $idAuth)
    {
        $this->message = $message;
        $this->idAuth = $idAuth
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat.' . $this->idAuth);
        
    }

    public function broadcastAs(){
        return 'mensagem.enviada';
    }
}
