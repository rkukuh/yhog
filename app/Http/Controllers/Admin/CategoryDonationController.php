<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryDonationStore;
use App\Http\Requests\Admin\CategoryDonationUpdate;

class CategoryDonationController extends Controller
{
    protected $categories;

    public function __construct()
    {
        $this->categories = Category::ofDonation()
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
        return view('admin.category.donation.index', [
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
     * @param  \CategoryDonationStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryDonationStore $request)
    {
        Category::create($request->all());

        return back()->with('success-message', 'New donation category has been added.');
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
        return view('admin.category.donation.index', [
            'content_alt'   => true,
            'category_edit' => $category,
            'categories'    => $this->categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \CategoryDonationUpdate  $request
     * @param  \App\Models\Admin\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryDonationUpdate $request, Category $category)
    {
        $category->update($request->all());

        return redirect()
                ->route('category-donation.index', [
                    'page' => $request->page ?? 1
                ])
                ->with('success-message', 'Donation category has been updated.');
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
