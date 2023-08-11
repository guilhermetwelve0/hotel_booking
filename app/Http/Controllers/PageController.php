<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landing(Request $request)
    {
        return view('web.landing');
    }
    public function about(){
        return view('web.about');
    }
    public function contact(){
        return view('web.contact');
    }
}
