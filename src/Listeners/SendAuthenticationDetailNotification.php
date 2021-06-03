<?php

namespace Pratiksh\Adminetic\Listeners;

use Illuminate\Support\Facades\Mail;
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
        if (env('MAIL_USERNAME') != null && env('MAIL_PASSWORD') != null) {
            Mail::to($event->user->email)->send(new AuthenticationDetailMail($event->user->email, $event->user->name, $event->password));
        }
    }
}
