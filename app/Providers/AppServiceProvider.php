<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'post' => 'App\Models\Post',
            'event' => 'App\Models\Event',
            'gallery' => 'App\Models\Gallery',
            'partner' => 'App\Models\Partner',
            'donation' => 'App\Models\Donation',
            'advertisement' => 'App\Models\Advertisement',
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
