<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStore;
use App\Http\Requests\Admin\CategoryUpdate;
use App\Models\Admin\Category;

class CategoryPostController extends Controller
{
    protected $categories;

    public function __construct()
    {
        $this->categories = Category::ofPost()
                                    ->with('parent', 'childs')
                                    ->doesntHave('parent')
                                    ->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categories;

        return view('admin.category.post.index', [
            'content_alt' => true,
            'categories'  => $this->categories,
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
     * @param  \CategoryStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \CategoryUpdate  $request
     * @param  \App\Models\Admin\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdate $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
