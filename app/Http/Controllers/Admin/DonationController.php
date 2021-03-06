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

            // Persist its attributes, if any
            $donation->categories()->attach($request->category_id);
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
        return view('admin.donation.show', compact('donation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation)
    {
        return view('admin.donation.edit', [
            'donation' => $donation,
            'tags' => $this->tags,
            'parent_categories' => $this->categories
        ]);
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
        if ($donation->update($request->all())) {

            // Sync its tags and/or categories
            $donation->tags()->sync($request->tag_id);
            $donation->categories()->sync($request->category_id);

            // If featured image(s) exists, persist
            if ($request->hasFile('images.*.image')) {
                $donation->uploadImages($request, $donation);
            }
        }

        return redirect()
                ->route('admin.donation.index', [
                    'page' => $request->page ?? 1
                ])
                ->with('success-message', 'Donation has been updated.');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function toggleActivation(Donation $donation)
    {
        $donation->toggleSingleActivation('Donation');
    }
}
