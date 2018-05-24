<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Event;
use App\Models\Partner;
use App\Models\Gallery;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventStore;
use App\Http\Requests\Admin\EventUpdate;

class EventController extends Controller
{
    protected $tags;
    protected $partners;
    protected $categories;

    public function __construct()
    {
        $this->tags         = Tag::get();
        $this->partners     = Partner::get();
        $this->galleries    = Gallery::get();
        $this->categories   = Category::ofEvent()->parentCategory()->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with('creator', 'categories', 'tags', 'partners', 'galleries')
                        ->latest()
                        ->paginate(env('PAGINATE', 5));

        /* This will prevent "Pagination gives empty set on non existing page number",
         * especially after deleting a data on the last page
         */
        if (Event::count()) {

            if ($events->isEmpty()) {

                return redirect()->route('event.index');
            }
        }

        return view('admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create', [
            'tags' => $this->tags,
            'partners' => $this->partners,
            'galleries' => $this->galleries,
            'parent_categories' => $this->categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \EventStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventStore $request)
    {
        if ($event = Event::create($request->all())) {

            // Persist its attributes, if any
            $event->categories()->attach($request->category_id);
            $event->galleries()->attach($request->gallery_id);
            $event->partners()->attach($request->partner_id);
            $event->tags()->attach($request->tag_id);

            // If featured image(s) exists, persist
            if ($request->hasFile('images.*.image')) {
                $event->uploadImages($request, $event);
            }
        }

        return redirect()->route('admin.event.index')
                         ->with('success-message', 'New event has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('admin.event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.event.edit', [
            'event' => $event,
            'tags' => $this->tags,
            'partners' => $this->partners,
            'galleries' => $this->galleries,
            'parent_categories' => $this->categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \EventUpdate  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventUpdate $request, Event $event)
    {
        if ($event->update($request->all())) {

            // Sync its attributes, if necessary
            $event->categories()->sync($request->category_id);
            $event->galleries()->sync($request->gallery_id);
            $event->partners()->sync($request->partner_id);
            $event->tags()->sync($request->tag_id);

            // If featured image(s) exists, persist
            if ($request->hasFile('images.*.image')) {

                // Remove any previous image(s)
                $event->images()->delete();

                $event->uploadImages($request, $event);
            }
        }

        return redirect()
                ->route('admin.event.index', [
                    'page' => $request->page ?? 1
                ])
                ->with('success-message', 'Event has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        // NOTE: This is a soft delete, no need to remove its associated image(s)

        $event->delete();

        return back()->with('success-message', 'Event has been removed.');
    }
}
