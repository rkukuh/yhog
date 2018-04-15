<?php

use App\User;
use Carbon\Carbon;
use App\Models\Donation;
use Faker\Generator as Faker;

$factory->define(Donation::class, function (Faker $faker) {

    return [
        'user_id' => function() {
            return factory(User::class)->create()->id;
        },

        'title' => $faker->sentence,
        'target' => $faker->randomElement([0, $faker->randomDigitNotNull * 1000000]),
        'location' => $faker->randomElement([null, $faker->address]),
        'start_at' => Carbon::now()->addDay(rand(-1, 3)),
        'end_at' => $faker->randomElement([null, Carbon::now()->addWeek(rand(0, 3))]),

        'video_url' => 'www.myvideo.example/' . $faker->uuid,
        'description' => $faker->text,
    ];

});
