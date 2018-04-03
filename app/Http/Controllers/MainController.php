<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function home()
    {
        $current_page = 'home';
        
        return view('front-end.pages.home', compact('current_page'));
    }
}