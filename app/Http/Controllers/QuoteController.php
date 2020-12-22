<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }

}
