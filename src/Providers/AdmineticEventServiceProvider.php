<?php

namespace Pratiksh\Adminetic\Providers;

use Pratiksh\Adminetic\Events\UserHasBeenRegistered;
use Pratiksh\Adminetic\Listeners\SendAuthenticationDetailNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class AdmineticEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        UserHasBeenRegistered::class => [
            SendAuthenticationDetailNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
