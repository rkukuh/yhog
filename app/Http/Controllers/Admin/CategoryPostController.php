<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryPostStore;
use App\Http\Requests\Admin\CategoryPostUpdate;

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
        return view('admin.category.post.index', [
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
     * @param  \CategoryPostStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryPostStore $request)
    {
        Category::create($request->all());

        return back()->with('success-message', 'New post category has been added.');
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
        return view('admin.category.post.index', [
            'content_alt'   => true,
            'category_edit' => $category,
            'categories'    => $this->categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \CategoryPostUpdate  $request
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryPostUpdate $request, Category $category)
    {
        $category->update($request->all());

        return redirect()
                ->route('category-post.index', [
                    'page' => $request->page ?? 1
                ])
                ->with('success-message', 'Post category has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('success-message', 'Post category has been removed.');
    }
}
