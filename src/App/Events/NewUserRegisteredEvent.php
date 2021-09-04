<?php

namespace Sparkouttech\UserMultiAuth\App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class NewUserRegisteredEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $request;
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($request,$user)
    {
        $this->user = $user;
        $this->request = $request;
    }
}
