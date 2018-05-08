<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagStore;
use App\Http\Requests\Admin\TagUpdate;

class TagController extends Controller
{
    protected $tags;

    public function __construct()
    {
        $this->tags = Tag::paginate(env('PAGINATE', 10));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tag.index', [
            'content_alt' => true,
            'tags'        => $this->tags
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \TagStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStore $request)
    {
        Tag::create($request->all());

        return back()->with('success-message', 'New tag has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tag.index', [
            'content_alt'   => true,
            'tag_edit'      => $tag,
            'tags'          => $this->tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \TagUpdate  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdate $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
