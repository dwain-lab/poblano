<?php

namespace App\Http\Controllers;

use App\Mail\BookMailableForm;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{


    public function bookingStore(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'message' => ['required'],
            'phone' => ['required'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i'],
        ]);

        $rules = [
            'people' => ['numeric', 'max:100', 'digits_between:1,100'],
        ];


        $customMessages = [
            'people.max' => '# of people must be less than 101',
            'people.numeric' => '# of people must be a number',
            'people.digits_between' => '# of people must be between 1 and 100',
        ];

        $this->validate($request, $rules, $customMessages);

        // dd($request);

        Book::create($request->all());

        $name = $request->name;
        $email = $request->email;
        $myMessage = $request->message;
        $phone = $request->phone;
        $date = $request->date;
        $time = $request->time;
        $people = $request->people;

        Mail::to('dwain22@gmail.com')->send(new BookMailableForm($name, $email, $phone, $myMessage, $date, $time, $people));

        return 'Thank you '.$name.' for booking with Poblano! Your request has been received and we will be contacting you as soon as possible!';
        // return back()->with('success', 'Thanks for contacting us! We will be contacting you as soon as possible!');
    }
}
