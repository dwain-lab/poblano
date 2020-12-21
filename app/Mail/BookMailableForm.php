<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookMailableForm extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $phone;
    public $myMessage;
    public $date;
    public $time;
    public $people;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $phone, $myMessage, $date, $time, $people)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->date = $date;
        $this->time = $time;
        $this->people = $people;
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
            ->subject('New Booking Request-'.Carbon::now())
            ->view('email.booking');
    }
}
