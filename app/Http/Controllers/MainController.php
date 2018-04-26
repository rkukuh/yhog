<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;


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
    
    public function contact()
    {
        $current_page = 'contact-us';
        
        return view('front-end.pages.contact-us', compact('current_page'));
    }
    
    public function partners()
    {
        $current_page = 'partners';
        
        return view('front-end.pages.partners', compact('current_page'));
    }
    
    public function projects()
    {
        $current_page = 'our-projects';
        
        return view('front-end.pages.our-projects', compact('current_page'));
    }
    
    public function events()
    {
        $latest_event = Event::latest()->first();
        
        if (isset($latest_event)) {

            $events = Event::where('id', '<>', $latest_event->id)
                            ->latest()
                            ->skip(1)->take(10)
                            ->paginate(9);
        }
	    
        return view('front-end.pages.events', [
            'current_page'  => 'events',
            'events'        => $events,
            'latest_event'  => $latest_event,
            'categories'    => Category::ofEvent()->get(),
        ]);
    }
    
    public function event_detail($id)
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