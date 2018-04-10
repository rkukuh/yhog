<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Partner;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PartnerStore;
use App\Http\Requests\Admin\PartnerUpdate;
use Illuminate\Foundation\Http\FormRequest;

class PartnerController extends Controller
{
    protected $tags;
    protected $categories;

    public function __construct()
    {
        $this->tags = Tag::get();

        $this->categories = Category::ofpartner()
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
        $partners = Partner::with('author', 'categories', 'tags')
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

            // Persist its category, they're always exists (required)
            $partner->categories()->attach($request->category_id);

            // Persist its tag, they're always exists (required)
            $partner->tags()->attach($request->tag_id);

            // If featured image(s) exists, persist
            if ($request->hasFile('images.*.image')) {
                $this->uploadFile($request, $partner);
            }
        }

        // If preview action performed, redirect to preview page
        if ($partner->previewed_at) {
            return view('admin.partner.preview', ['partner' => $partner]);
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

            // Sync its tags and/or categories
            $partner->tags()->sync($request->tag_id);
            $partner->categories()->sync($request->category_id);

            // If featured image(s) exists, persist
            if ($request->hasFile('images.*.image')) {
                $this->uploadFile($request, $partner);
            }
        }

        // If preview action performed, redirect to preview page
        if ($partner->previewed_at) {
            return view('admin.partner.preview', ['partner' => $partner]);
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

    /**
     * Associate a file(s) for a partner.
     *
     * @param  \Illuminate\Foundation\Http\FormRequest $request
     * @param  \App\Models\Partner $partner
     * @return void
     */
    protected function uploadFile(FormRequest $request, Partner $partner)
    {
        $path = 'partner-' . $partner->id;

        foreach ($request['images'] as $file) {

            $fileExtension  = $file['image']->getClientOriginalExtension();
            $fileName       = Carbon::now()->format('Ymdhis') . '-' . mt_rand(100, 999) . '.' . $fileExtension;

            $file['image']->storeAs('public/' . $path, $fileName);

            // Persist file(s) to database, and associate them with this partner
            $partner->images()->create([
                'path' => $path . '/' . $fileName,
                'size' => $file['image']->getSize(),
                'mime' => $file['image']->getMimeType()
            ]);
        }
    }
}
