<?php

namespace App\Events;

use App\Models\Mensagen;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithBroadcasting;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PursherBroadcast implements ShouldBroadcast, ShouldQueue
{
    public int $idAuth;
    public string $message;

    use Dispatchable, InteractsWithSockets, SerializesModels, InteractsWithBroadcasting;

    /**
     * Create a new event instance.
     */
    public function __construct(string $message, $idAuth){
        $this->message = $message;
        $this->idAuth = $idAuth;
        $this->broadcastVia('pusher');
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return [new PrivateChannel('chat.' . $this->idAuth)];
        
    }

    public function broadcastWith(){
        return [
            'conteudoMensagem' => $this->message,
        ];
    }

    public function broadcastAs(){
        return 'mensagem-enviada';
    }
}
