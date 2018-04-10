<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function home()
    {
        $current_page = 'home';
        
        return view('front-end.pages.home', compact('current_page'));
    }
    
    public function projects()
    {
        $current_page = 'our-projects';
        
        return view('front-end.pages.our-projects', compact('current_page'));
    }
    
    public function events()
    {
        $current_page = 'events';
        
        return view('front-end.pages.events', compact('current_page'));
    }
    
    public function event_detail()
    {
        $current_page = 'event-detail';
        
        return view('front-end.pages.event-detail', compact('current_page'));
    }
}