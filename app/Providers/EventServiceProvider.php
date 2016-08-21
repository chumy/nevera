<?php

namespace Nevera\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    /*protected $listen = [
        'Nevera\Events\SomeEvent' => [
            'Nevera\Listeners\EventListener',
        ],
    ];*/

    protected $listen = [
        'Illuminate\Auth\Events\Login' => [
            'Nevera\Events\AuthLoginEventHandler',  
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
