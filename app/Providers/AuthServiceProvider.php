<?php

namespace App\Providers;

use App\User;
use App\Models\Tag;
use App\Models\Image;
use App\Models\Admin\Post;
use App\Policies\TagPolicy;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
use App\Policies\ImagePolicy;
use App\Models\Admin\Category;
use App\Policies\CategoryPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Tag::class => TagPolicy::class,
        User::class => UserPolicy::class,
        Post::class => PostPolicy::class,
        Image::class => ImagePolicy::class,
        Category::class => CategoryPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
