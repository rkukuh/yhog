<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Event;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventStore;
use App\Http\Requests\Admin\EventUpdate;
use Illuminate\Foundation\Http\FormRequest;

class EventController extends Controller
{
    protected $tags;
    protected $categories;

    public function __construct()
    {
        $this->tags = Tag::get();

        $this->categories = Category::ofEvent()
                                    ->parentCategory()
                                    ->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with('creator', 'categories', 'tags')
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
            'parent_categories' => $this->categories
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

            // Persist its category, they're always exists (required)
            $event->categories()->attach($request->category_id);

            if ($request->has('tag_id')) {
                $event->tags()->attach($request->tag_id);
            }

            // If featured image(s) exists, persist
            if ($request->hasFile('images.*.image')) {
                $this->uploadFile($request, $event);
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
        //
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
            'parent_categories' => $this->categories
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

            // Sync its tags and/or categories
            $event->tags()->sync($request->tag_id);
            $event->categories()->sync($request->category_id);

            // If featured image(s) exists, persist
            if ($request->hasFile('images.*.image')) {
                $this->uploadFile($request, $event);
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
        //
    }

    /**
     * Associate a file(s) for a event.
     *
     * @param  \Illuminate\Foundation\Http\FormRequest $request
     * @param  \App\Models\Event $event
     * @return void
     */
    protected function uploadFile(FormRequest $request, Event $event)
    {
        $path = 'event-' . $event->id;

        foreach ($request['images'] as $file) {

            $fileExtension  = $file['image']->getClientOriginalExtension();
            $fileName       = Carbon::now()->format('Ymdhis') . '-' . mt_rand(100, 999) . '.' . $fileExtension;

            $file['image']->storeAs('public/' . $path, $fileName);

            // Persist file(s) to database, and associate them with this event
            $event->images()->create([
                'path' => $path . '/' . $fileName,
                'size' => $file['image']->getSize(),
                'mime' => $file['image']->getMimeType()
            ]);
        }
    }
}
