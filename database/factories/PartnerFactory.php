<?php

use App\User;
use Carbon\Carbon;
use App\Models\Partner;
use Faker\Generator as Faker;

$factory->define(Partner::class, function (Faker $faker) {

    return [
        'creator_id' => function() {
            return factory(User::class)->create()->id;
        },
        'title' => $faker->sentence,
        'body' => $faker->text,
        'published_at' => $faker->randomElement([
            null, 
            Carbon::now()->addDay(rand(0, 3))
        ])
    ];

});
