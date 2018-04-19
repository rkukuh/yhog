<?php

use App\User;
use Carbon\Carbon;
use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

    return [
        'creator_id' => function() {
            return factory(User::class)->create()->id;
        },
        'title' => $faker->sentence,
        'excerpt' => $faker->text,
        'body' => $faker->text(3000),
        'published_at' => $faker->randomElement([
            null, 
            Carbon::now()->addDay(rand(0, 3))
        ])
    ];
    
});
