<?php

use App\User;
use Carbon\Carbon;
use App\Models\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {

    $price = $faker->randomElement([null, 0, $faker->randomDigitNotNull * 1000000]);

    $start_at = Carbon::now()->addDay(rand(-1, 2));

    if ($price || ($price > 0)) {
        $early_bird_price = 0.5 * $price;
    } else {
        $early_bird_price = $faker->randomElement([null, 0]);
    }

    if ($early_bird_price || ($early_bird_price > 0)) {
        $early_bird_price_end_at = Carbon::parse($start_at)->subDay(1);
    } else {
        $early_bird_price_end_at = null;
    }

    return [
        'creator_id' => function() {
            return factory(User::class)->create()->id;
        },
        
        'name' => 'Event Test #' . $faker->unixTime(),
        'size' => $faker->randomElement([null, 0, $faker->randomDigitNotNull * 10]),
        'location' => $faker->randomElement([null, $faker->address]),
        'description' => $faker->randomElement([null, $faker->paragraph]),
        
        'price' => $price,
        'early_bird_price' => $early_bird_price,
        'early_bird_price_end_at' => $early_bird_price_end_at,

        'start_at' => new Carbon($start_at), 
        'end_at' => $faker->randomElement([null, Carbon::parse($start_at)->addWeek(rand(0, 4))]),
    ];

});
