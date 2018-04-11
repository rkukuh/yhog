<?php

use App\Models\Donation;
use Faker\Generator as Faker;

$factory->define(Donation::class, function (Faker $faker) {

    return [
        'user_id' => function() {
            return factory(User::class)->create()->id;
        },

        'title' => $faker->sentence,
        'target' => $faker->randomElement([null, 0, $faker->randomDigitNotNull * 1000000]),
        'location' => $faker->randomElement([null, $faker->address]),
        'end_at' => $faker->randomElement([null, Carbon::now()->addDay(rand(0, 3))]),

        'video_url' => 'www.myvideo.example/' . $faker->uuid,
        'excerpt' => $faker->text,
        'description' => $faker->text(3000),
    ];

});
