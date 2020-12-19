<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $mySubject;
    public $myMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $mySubject, $myMessage)
    {
        // , $message, $email, $subject
        $this->name = $name;
        $this->email = $email;
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

        return $this->from('info@poblano.bz')
            ->subject('New Contact Us Request-'.Carbon::now())
            ->view('email.contact');
    }
}
