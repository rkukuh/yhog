<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Gallery;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryStore;
use App\Http\Requests\Admin\GalleryUpdate;

class GalleryController extends Controller
{
    protected $tags;
    protected $categories;

    public function __construct()
    {
        $this->tags = Tag::get();

        $this->categories = Category::ofGallery()
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
        $galleries = Gallery::with('creator', 'categories', 'tags')
                        ->latest()
                        ->paginate(env('PAGINATE', 8));

        /* This will prevent "Pagination gives empty set on non existing page number",
         * especially after deleting a data on the last page
         */
        if (Gallery::count()) {

            if ($galleries->isEmpty()) {

                return redirect()->route('gallery.index');
            }
        }

        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create', [
            'tags' => $this->tags,
            'parent_categories' => $this->categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Galleriestore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryStore $request)
    {
        if ($gallery = Gallery::create($request->all())) {

            // Persist its attributes, if any
            $gallery->categories()->attach($request->category_id);
            $gallery->tags()->attach($request->tag_id);

            // If featured image(s) exists, persist
            if ($request->hasFile('images.*.image')) {
                $gallery->uploadImages($request, $gallery);
            }
        }

        return redirect()->route('admin.gallery.index')
                         ->with('success-message', 'New gallery has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', [
            'tags' => $this->tags,
            'gallery' => $gallery,
            'parent_categories' => $this->categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \GalleryUpdate  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryUpdate $request, Gallery $gallery)
    {
        $gallery->update($request->all());

        return redirect()
                ->route('admin.gallery.index', [
                    'page' => $request->page ?? 1
                ])
                ->with('success-message', 'Gallery has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        // NOTE: This is a soft delete, no need to remove its associated image(s)

        $gallery->delete();

        return back()->with('success-message', 'Gallery has been removed.');
    }
}
