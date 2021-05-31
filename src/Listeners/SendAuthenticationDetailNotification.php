<?php

namespace Pratiksh\Adminetic\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Pratiksh\Adminetic\Mail\AuthenticationDetailMail;

class SendAuthenticationDetailNotification
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->user->email)->send(new AuthenticationDetailMail($event->user->email, $event->user->name, $event->password));
    }
}
