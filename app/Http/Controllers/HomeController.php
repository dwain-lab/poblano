<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Event;
use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function mainIndex()
    {
        $galleries = Gallery::all();
        $abouts = About::all();
        $events = Event::all();

        return view('index', compact('galleries', 'abouts', 'events'));

    }
}
