<?php

namespace Sparkouttech\UserAuth\App\Listeners;

use Sparkouttech\UserAuth\App\Jobs\WelcomEmailJob;
use Sparkouttech\UserAuth\App\Mail\WelcomeNewUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Log;

class WelcomeNewUserListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        try {
//            dispatch(new WelcomEmailJob($event->user));
        } catch (\Exception $exception) {
            Log::error('Exception occurred on email');
            Log::error(print_r($exception));
        }

    }
}
