<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function home()
    {
        $current_page = 'home';
        
        return view('front-end.pages.home', compact('current_page'));
    }
    
    public function about()
    {
        $current_page = 'about-us';
        
        return view('front-end.pages.about-us', compact('current_page'));
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
        $current_page = 'events';
        
        return view('front-end.pages.event-detail', compact('current_page'));
    }
    
    public function blog()
    {
        $current_page = 'blog';
        
        return view('front-end.pages.blog', compact('current_page'));
    }
    
    public function blog_article()
    {
        $current_page = 'blog';
        
        return view('front-end.pages.blog-article', compact('current_page'));
    }
    
    public function gallery()
    {
        $current_page = 'gallery';
        
        return view('front-end.pages.gallery', compact('current_page'));
    }
    
    public function gallery_detail()
    {
        $current_page = 'gallery';
        
        return view('front-end.pages.gallery-detail', compact('current_page'));
    }
}