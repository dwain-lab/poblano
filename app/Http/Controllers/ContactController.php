<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // public function mail()
    // {
    //    $name = 'This is a Test';
    //    Mail::to('dwain22@gmail.com')->send(new ContactForm($name, $message, $email, $subject));

    //    return 'Email sent Successfully';
    // }

    public function contactUsStore(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'message' => ['required'],
        ]);


        $name = $request->name;
        $email = $request->email;
        $mySubject = $request->subject;
        $myMessage = $request->message;

        Mail::to('dwain22@gmail.com')->send(new ContactForm($name, $email, $mySubject, $myMessage));

        Contact::create($request->all());

        return 'Thank you '.$name.' for contacting Poblano! Your request has been received and someone will contact you as soon as possible!';
    }
}


