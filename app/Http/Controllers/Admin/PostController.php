<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostStore;
use App\Http\Requests\Admin\PostUpdate;
use Illuminate\Foundation\Http\FormRequest;

class PostController extends Controller
{
    protected $tags;
    protected $categories;

    public function __construct()
    {
        $this->tags = Tag::get();

        $this->categories = Category::ofPost()
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
        $posts = Post::with('author', 'categories', 'tags')
                        ->latest()
                        ->paginate(env('PAGINATE', 5));

        /* This will prevent "Pagination gives empty set on non existing page number",
         * especially after deleting a data on the last page
         */
        if (Post::count()) {

            if ($posts->isEmpty()) {

                return redirect()->route('post.index');
            }
        }

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create', [
            'tags' => $this->tags,
            'parent_categories' => $this->categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \PostStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStore $request)
    {
        if ($post = Post::create($request->all())) {

            // Persist its category, they're always exists (required)
            $post->categories()->attach($request->category_id);

            // Persist its tag, they're always exists (required)
            $post->tags()->attach($request->tag_id);

            // If featured image(s) exists, persist
            if ($request->hasFile('images.*.image')) {
                $this->uploadFile($request, $post);
            }
        }

        // If preview action performed, redirect to preview page
        if ($post->previewed_at) {
            return view('admin.post.preview', ['post' => $post]);
        }

        return redirect()->route('admin.post.index')
                         ->with('success-message', 'New post has been added.');
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
        return view('admin.post.edit', [
            'post' => $post,
            'tags' => $this->tags,
            'parent_categories' => $this->categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \PostUpdate  $request
     * @param  \App\Models\Admin\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdate $request, Post $post)
    {
        if ($post->update($request->all())) {

            // Sync its tags and/or categories
            $post->tags()->sync($request->tag_id);
            $post->categories()->sync($request->category_id);

            // If featured image(s) exists, persist
            if ($request->hasFile('images.*.image')) {
                $this->uploadFile($request, $post);
            }
        }

        // If preview action performed, redirect to preview page
        if ($post->previewed_at) {
            return view('admin.post.preview', ['post' => $post]);
        }

        return redirect()
                ->route('admin.post.index', [
                    'page' => $request->page ?? 1
                ])
                ->with('success-message', 'Post has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // NOTE: This is a soft delete, no need to remove its associated image(s)

        $post->delete();

        return back()->with('success-message', 'Post has been removed.');
    }

    /**
     * Associate a file(s) for a post.
     *
     * @param  \Illuminate\Foundation\Http\FormRequest $request
     * @param  \App\Models\Post $post
     * @return void
     */
    protected function uploadFile(FormRequest $request, Post $post)
    {
        $path = 'post-' . $post->id;

        foreach ($request['images'] as $file) {

            $fileExtension  = $file['image']->getClientOriginalExtension();
            $fileName       = Carbon::now()->format('Ymdhis') . '-' . mt_rand(100, 999) . '.' . $fileExtension;

            $file['image']->storeAs('public/' . $path, $fileName);

            // Persist file(s) to database, and associate them with this post
            $post->images()->create([
                'path' => $path . '/' . $fileName,
                'size' => $file['image']->getSize(),
                'mime' => $file['image']->getMimeType()
            ]);
        }
    }
}
