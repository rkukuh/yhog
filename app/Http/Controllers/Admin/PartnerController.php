<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Partner;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PartnerStore;
use App\Http\Requests\Admin\PartnerUpdate;

class PartnerController extends Controller
{
    protected $tags;
    protected $categories;

    public function __construct()
    {
        $this->tags = Tag::get();

        $this->categories = Category::ofPartner()
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
        $partners = Partner::with('creator', 'categories', 'tags')
                            ->latest()
                            ->paginate(env('PAGINATE', 5));

        /* This will prevent "Pagination gives empty set on non existing page number",
         * especially after deleting a data on the last page
         */
        if (Partner::count()) {

            if ($partners->isEmpty()) {

                return redirect()->route('partner.index');
            }
        }

        return view('admin.partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partner.create', [
            'tags' => $this->tags,
            'parent_categories' => $this->categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \PartnerStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerStore $request)
    {
        if ($partner = Partner::create($request->all())) {

            // Persist its attributes, if any

            $partner->tags()->attach($request->tag_id);

            $partner->categories()->attach(
                Category::ofPartner()->where('slug', $request->category)->first()
            );

            // If featured image(s) exists, persist
            if ($request->hasFile('images.*.image')) {
                $partner->uploadImages($request, $partner, false);
            }

            // If sponsor image(s) exists, persist
            if ($request->hasFile('sponsor_images.*.image')) {
                $partner->uploadSponsorImage($request, $partner, true);
            }

            // If ad unit exists, persist
            if ($request->hasFile('ads_image')) {
                
                $ads = $partner->advertisements()->create(['url' => $request['url']]);

                $partner->uploadAdUnit($request['ads_image'], $ads);
            }
        }

        return redirect()->route('admin.partner.index')
                         ->with('success-message', 'New partner has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view('admin.partner.edit', [
            'partner' => $partner,
            'tags' => $this->tags,
            'parent_categories' => $this->categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \PartnerUpdate  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(PartnerUpdate $request, Partner $partner)
    {
        if ($partner->update($request->all())) {

            // Sync its attributes, if necessary

            $partner->tags()->sync($request->tag_id);
            
            $partner->categories()->sync(
                Category::ofPartner()->where('slug', $request->category)->first()
            );

            // If featured image(s) exists, persist
            if ($request->hasFile('images.*.image')) {
                
                // Remove any previous non-sponsor image(s)
                $partner->images()->where('is_sponsor_image', false)->delete();

                $partner->uploadImages($request, $partner, false);
            }

            // If sponsor image(s) exists, persist
            if ($request->hasFile('sponsor_images.*.image')) {
                
                // Remove any previous sponsor image(s)
                $partner->images()->where('is_sponsor_image', true)->delete();

                $partner->uploadSponsorImage($request, $partner, true);
            }

            // If ad unit exists, persist
            if ($request->hasFile('ads_image')) {

                // Remove any previous ad unit and its image, if any
                if ( ! $partner->advertisements->isEmpty()) {

                    $partner->advertisements()->first()->images()->delete();
                    $partner->advertisements()->delete();
                }
                
                $ads = $partner->advertisements()->create(['url' => $request['url']]);
                
                $partner->uploadAdUnit($request['ads_image'], $ads);
            }
        }

        return redirect()
                ->route('admin.partner.index', [
                    'page' => $request->page ?? 1
                ])
                ->with('success-message', 'Partner has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        // NOTE: This is a soft delete, no need to remove its associated image(s)

        $partner->delete();

        return back()->with('success-message', 'Partner has been removed.');
    }
}
