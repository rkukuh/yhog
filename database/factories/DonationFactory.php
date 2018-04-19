<?php

use App\User;
use Carbon\Carbon;
use App\Models\Donation;
use Faker\Generator as Faker;

$factory->define(Donation::class, function (Faker $faker) {

    return [
        'creator_id' => function() {
            return factory(User::class)->create()->id;
        },
        'title' => $faker->sentence,
        'description' => $faker->text,
        'target' => $faker->randomElement([0, $faker->randomDigitNotNull * 1000000]),
        'location' => $faker->randomElement([null, $faker->address]),
        'video_url' => 'www.myvideo.example/' . $faker->uuid,
        'end_at' => $faker->randomElement([null, Carbon::now()->addWeek(rand(2, 4))]),
    ];

});
