<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Event;
use App\Models\Partner;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Donation;
use App\Models\Advertisement;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client as GuzzleHttpClient;

class MainController extends Controller
{
    protected $sponsor;
    protected $upcoming_events;

    public function __construct()
    {
        $this->upcoming_events = Event::latest()->take(2)->skip(0)->get();
        $this->sponsor = Advertisement::whereNotNull('activated_at')->first();
    }

    public function home()
    {
        $supporting_partners = Partner::ofYayasan()->published()->get();

        return view('front-end.pages.home', [
            'current_page'          => 'home',
            'sponsor'               => $this->sponsor,
            'supporting_partners'   => $supporting_partners ?? null,
            'upcoming_events'       => $this->upcoming_events ?? null,
        ]);
    }
    
    public function about()
    {   
        return view('front-end.pages.about-us', [
            'current_page'      => 'about-us',
            'upcoming_events'   => $this->upcoming_events ?? null,
        ]);
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
            'partners'      => Partner::ofYayasan()->get()
        ]);
    }
    
    public function projects()
    {
        return view('front-end.pages.our-projects', [
            'current_page'      => 'our-projects',
            'sponsor'           => $this->sponsor,
            'upcoming_events'   => $this->upcoming_events ?? null,
        ]);
    }
    
    public function events()
    {
        $latest_event = Event::latest()->first();
        
        if (isset($latest_event)) {

            if (request()->query('category')) {
                
                $events = Category::ofEvent()
                                    ->findOrFail(
                                        request()->query('category')
                                    )
                                    ->events;
            }
            else {

                $events = Event::where('id', '<>', $latest_event->id)
                                ->latest()
                                ->get();
            }
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
        if ($address = Event::findOrFail($id)->location) {

            $client = new GuzzleHttpClient;

            $response = $client->get('https://maps.googleapis.com/maps/api/geocode/json', [
                'query' => [
                    'key' => env('GOOGLE_MAP_API_KEY'),
                    'address' => $address,
                ]
            ])
            ->getBody()
            ->getContents();

            $decoded = json_decode($response, true);

            $location   = $decoded['results'][0]['geometry']['location'];
            $latitude   = $location['lat'];
            $longitude  = $location['lng'];
        }

        return view('front-end.pages.event-detail', [
            'current_page'  => 'events',
            'sponsor'       => $this->sponsor,
            'lat'           => $latitude ?? null,
            'lng'           => $longitude ?? null,
            'event'         => Event::findOrFail($id),
        ]);
    }
    
    public function blog()
    {
        $latest_post = Post::published()->latest()->first();
        
        if (isset($latest_post)) {

            if (request()->query('category')) {
                
                $posts = Category::ofPost()
                                ->findOrFail(
                                    request()->query('category')
                                )
                                ->posts;
            } 
            else {

                $posts = Post::where('id', '<>', $latest_post->id)
                            ->latest()
                            ->get();
            }

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
        $post = Post::published()->findOrFail($id);
        
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
            'sponsor'       => $this->sponsor,
        ]);
    }
    
    public function gallery()
    {
        $latest_gallery = Gallery::published()->latest()->first();
        
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
        return view('front-end.pages.donations', [
            'current_page'  => 'donations',
            'donation'      => Donation::whereNotNull('activated_at')->first(),
        ]);
    }
}