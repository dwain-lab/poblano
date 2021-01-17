<?php

namespace App\Http\Controllers;

class QuoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
