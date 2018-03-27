<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryPartnerStore;
use App\Http\Requests\Admin\CategoryPartnerUpdate;

class CategoryPartnerController extends Controller
{
    protected $categories;

    public function __construct()
    {
        $this->categories = Category::ofPartner()
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
        return view('admin.category.partner.index', [
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
     * @param  \CategoryPartnerStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryPartnerStore $request)
    {
        Category::create($request->all());

        return back()->with('success-message', 'New partner category has been added.');
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
        return view('admin.category.partner.index', [
            'content_alt'   => true,
            'category_edit' => $category,
            'categories'    => $this->categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \CategoryPartnerUpdate  $request
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryPartnerUpdate $request, Category $category)
    {
        $category->update($request->all());

        return redirect()
                ->route('category-partner.index', [
                    'page' => $request->page ?? 1
                ])
                ->with('success-message', 'Partner category has been updated.');
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
