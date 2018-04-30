<?php

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Gallery;
use Faker\Generator as Faker;

$factory->define(Gallery::class, function (Faker $faker) {

    return [
        'creator_id' => function() {
            return factory(User::class)->create()->id;
        },
        
        'title' => $faker->sentence,
        'description' => $faker->text,

        'published_at' => $faker->randomElement([
            null, 
            Carbon::now()->addDay(rand(0, 3))
        ]),
    ];

});
