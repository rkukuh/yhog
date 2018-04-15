<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Category;
use App\Models\Donation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DonationStore;
use App\Http\Requests\Admin\DonationUpdate;

class DonationController extends Controller
{
    protected $tags;
    protected $categories;

    public function __construct()
    {
        $this->tags = Tag::get();

        $this->categories = Category::ofDonation()
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
        $donations = Donation::with('creator', 'categories', 'tags')
                        ->latest()
                        ->paginate(env('PAGINATE', 5));

        /* This will prevent "Pagination gives empty set on non existing page number",
         * especially after deleting a data on the last page
         */
        if (Donation::count()) {

            if ($donations->isEmpty()) {

                return redirect()->route('donation.index');
            }
        }

        return view('admin.donation.index', compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.donation.create', [
            'tags' => $this->tags,
            'parent_categories' => $this->categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \DonationStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DonationStore $request)
    {
        if ($donation = Donation::create($request->all())) {

            // Persist its category, they're always exists (required)
            $donation->categories()->attach($request->category_id);

            // Persist its tag, they're always exists (required)
            $donation->tags()->attach($request->tag_id);

            // If featured image(s) exists, persist
            if ($request->hasFile('images.*.image')) {
                $donation->uploadImages($request, $donation);
            }
        }

        return redirect()->route('admin.donation.index')
                         ->with('success-message', 'New donation has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \DonationUpdate  $request
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(DonationUpdate $request, Donation $donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donation $donation)
    {
        // NOTE: This is a soft delete, no need to remove its associated image(s)

        $donation->delete();

        return back()->with('success-message', 'Donation has been removed.');
    }
}
