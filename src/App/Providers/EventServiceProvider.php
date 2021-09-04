<?php

namespace Sparkouttech\UserMultiAuth\App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Sparkouttech\UserMultiAuth\App\Events\NewUserRegisteredEvent;
use Sparkouttech\UserMultiAuth\App\Listeners\ReferralNewUserListener;
use Sparkouttech\UserMultiAuth\App\Listeners\WelcomeNewUserListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NewUserRegisteredEvent::class => [
            // register listeners for event new user registered
            WelcomeNewUserListener::class,
            ReferralNewUserListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
