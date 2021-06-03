<?php

namespace Pratiksh\Adminetic\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AuthenticationDetailMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    public $name;

    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $name, $password)
    {
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('adminetic::admin.layouts.modules.email.authentication_detail_mail');
    }
}
