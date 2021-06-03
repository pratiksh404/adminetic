<?php

namespace Pratiksh\Adminetic\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Pratiksh\Adminetic\Events\UserHasBeenRegistered;
use Pratiksh\Adminetic\Listeners\SendAuthenticationDetailNotification;

class AdmineticEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        UserHasBeenRegistered::class => [
            SendAuthenticationDetailNotification::class,
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
    }
}
