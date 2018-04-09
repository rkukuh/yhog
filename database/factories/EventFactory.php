<?php

use App\User;
use Carbon\Carbon;
use App\Models\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {

    $price = $faker->randomElement([null, 0, $faker->randomDigitNotNull * 1000000]);

    $start_at = Carbon::now()->addDay(rand(0, 3));

    if ($price || ($price > 0)) {
        $early_bird_price = 0.5 * $price;
    } else {
        $early_bird_price = $faker->randomElement([null, 0]);
    }

    if ($early_bird_price || ($early_bird_price > 0)) {
        $early_bird_price_end_at = $start_at->subDay(1);
    } else {
        $early_bird_price_end_at = null;
    }

    return [
        'user_id' => function() {
            return factory(User::class)->create()->id;
        },
        
        'name' => 'Event Test #' . $faker->unixTime(),
        'size' => $faker->randomElement([null, $faker->randomDigitNotNull * 10]),
        'location' => $faker->randomElement([null, $faker->address]),
        'description' => $faker->randomElement([null, $faker->paragraph]),
        
        'price' => $price,
        'early_bird_price' => $early_bird_price,
        'early_bird_price_end_at' => $early_bird_price_end_at,

        'start_at' => $start_at,
        'end_at' => $faker->randomElement([null, Carbon::now()->addWeek(rand(2, 4))]),
        'total_hours' => $faker->randomDigitNotNull,
    ];

});
