<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryEventStore;
use App\Http\Requests\Admin\CategoryEventUpdate;

class CategoryEventController extends Controller
{
    protected $categories;

    public function __construct()
    {
        $this->categories = Category::ofEvent()
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
        return view('admin.category.event.index', [
            'content_alt' => true,
            'categories'  => $this->categories
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
     * @param  \CategoryEventStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryEventStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.event.index', [
            'content_alt'   => true,
            'category_edit' => $category,
            'categories'    => $this->categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \CategoryEventUpdate  $request
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryEventUpdate $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
