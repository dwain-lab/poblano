<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Quote;
use App\Models\Special;
use App\Models\Why;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //  $this->middleware('guest');
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
        $galleries = Gallery::all()->random(8);
        $abouts = About::all();
        $events = Event::all();
        $menus = Menu::all()->sortBy('dish');
        $menu_categories = MenuCategory::has('menus')->get()->sortBy('name');
        $specials = Special::all()->sortBy('link');
        $specialFirst = $specials->pluck('id')->first();
        $whys = Why::all();

        // dd($menu_categories);

        $quote = Quote::all()->random(1)->first();

        return view('index', compact('galleries', 'abouts', 'events', 'menus', 'menu_categories', 'specials', 'specialFirst', 'whys', 'quote'));

    }
}
