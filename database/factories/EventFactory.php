<?php

use App\User;
use Carbon\Carbon;
use App\Models\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {

    return [
        'user_id' => function() {
            return factory(User::class)->create()->id;
        },
        
        'name' => 'Event Test #' . $faker->unixTime(),
        'size' => $faker->randomElement([null, $faker->randomDigitNotNull * 10]),
        'location' => $faker->randomElement([null, $faker->address]),
        'description' => $faker->randomElement([null, $faker->paragraph]),
        
        'price' => $faker->randomElement([null, $faker->randomDigitNotNull * 1000000]),
        'early_bird_price' => null,
        'early_bird_price_end_at' => null,

        'start_at' => Carbon::now()->addDay(rand(0, 3)),
        'end_at' => $faker->randomElement([null, Carbon::now()->addWeek(rand(2, 4))]),
        'total_hours' => $faker->randomDigitNotNull,
    ];

});
