<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactForm extends Mailable
{
    use Queueable;
    use SerializesModels;

    public $name;
    public $email;
    public $mySubject;
    public $myMessage;

    /**
     * Create a new message instance.
     *
     * @param mixed $name
     * @param mixed $email
     * @param mixed $mySubject
     * @param mixed $myMessage
     */
    public function __construct($name, $email, $mySubject, $myMessage)
    {
        $this->name      = $name;
        $this->email     = $email;
        $this->mySubject = $mySubject;
        $this->myMessage = $myMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($address = 'info@poblano.bz', $name = 'Poblano.bz')
            ->subject('New Contact Us Request-'.Carbon::now())
            ->view('email.contact')
        ;
    }
}
