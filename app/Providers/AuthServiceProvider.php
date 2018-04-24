<?php

namespace App\Providers;

use App\User;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Image;
use App\Models\Event;
use App\Models\Partner;
use App\Models\Gallery;
use App\Models\Donate;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Donation;
use App\Policies\TagPolicy;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
use App\Policies\EventPolicy;
use App\Policies\ImagePolicy;
use App\Policies\DonatePolicy;
use App\Policies\BannerPolicy;
use App\Policies\PartnerPolicy;
use App\Policies\GalleryPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\DonationPolicy;
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
        Event::class => EventPolicy::class,
        Donate::class => DonatePolicy::class,
        Banner::class => BannerPolicy::class,
        Partner::class => PartnerPolicy::class,
        Gallery::class => GalleryPolicy::class,
        Category::class => CategoryPolicy::class,
        Donation::class => DonationPolicy::class,
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
