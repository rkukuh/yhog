<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Event;
use App\Models\Partner;
use App\Models\Gallery;
use App\Models\Category;


class MainController extends Controller
{
    public function home()
    {
        $upcoming_events = Event::latest()->take(2)->skip(0)->get();

        return view('front-end.pages.home', [
            'current_page'      => 'home',
            'upcoming_events'   => $upcoming_events ?? null,
        ]);
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
        return view('front-end.pages.partners', [
            'current_page'  => 'partners',
            'partners'      => Partner::get()
        ]);
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
                            ->get();
        }
	    
        return view('front-end.pages.events', [
            'current_page'  => 'events',
            'latest_event'  => $latest_event,
            'events'        => $events ?? null,
            'categories'    => Category::ofEvent()->get(),
        ]);
    }
    
    public function event_detail($id)
    {
        return view('front-end.pages.event-detail', [
            'current_page'  => 'events',
            'event'         => Event::findOrFail($id)
        ]);
    }
    
    public function blog()
    {
        $latest_post = Post::latest()->first();
        
        if (isset($latest_post)) {

            $posts = Post::where('id', '<>', $latest_post->id)
                        ->latest()
                        ->get();
        }
	    
        return view('front-end.pages.blog', [
            'current_page'  => 'blog',
            'latest_post'   => $latest_post,
            'posts'         => $posts ?? null,
            'categories'    => Category::ofPost()->get(),
        ]);
    }
    
    public function blog_article($id)
    {
        $post = Post::findOrFail($id);
        
        if (Post::count() <= 4) {
            $posts = Post::get()->random(Post::count());
        }
        elseif (Post::count() > 4) {
            $posts = Post::where('id', '<>', $post->id)->get()->random(4);
        }

        return view('front-end.pages.blog-article', [
            'current_page'  => 'blog',
            'post'          => $post,
            'more_posts'    => $posts,
        ]);
    }
    
    public function gallery()
    {
        $latest_gallery = Gallery::latest()->first();
        
        if (isset($latest_gallery)) {

            $galleries = Gallery::where('id', '<>', $latest_gallery->id)
                                ->latest()
                                ->get();
        }
	    
        return view('front-end.pages.gallery', [
            'current_page'      => 'gallery',
            'latest_gallery'    => $latest_gallery,
            'galleries'         => $galleries ?? null,
            'categories'        => Category::ofGallery()->get(),
        ]);
    }
    
    public function gallery_detail($id)
    {
        return view('front-end.pages.gallery-detail', [
            'current_page'  => 'gallery',
            'gallery'       => Gallery::findOrFail($id),
        ]);
    }
    
    public function donations()
    {
        $current_page = 'donations';
        
        return view('front-end.pages.donations', compact('current_page'));
    }
}