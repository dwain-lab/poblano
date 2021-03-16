<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // public function contactUsStore()
    // {
    //     $name        = 'Dwain';
    //     $myMessage   = 'Hello boy';
    //     $email       = 'dwain22@gmail.com';
    //     $mySubject   = 'Hello World';
    //     Mail::to('dwain22@gmail.com')->send(new ContactForm($name, $email, $mySubject, $myMessage));

    //     return 'Email sent Successfully';
    // }

    public function contactUsStore(Request $request)
    {
        $receiverEmail = 'dwain22@gmail.com';
        $request->validate([
            'name'    => ['required'],
            'email'   => ['required', 'email'],
            'message' => ['required'],
        ]);

        // dd($request->all());

        $name      = $request->name;
        $email     = $request->email;
        $mySubject = $request->subject;
        $myMessage = $request->message;

        Mail::to($receiverEmail)->send(new ContactForm($name, $email, $mySubject, $myMessage));

        Contact::create($request->all());

        return 'Thank you '.$name.' for contacting Poblano! Your request has been received and someone will contact you as soon as possible!';
    }
}
