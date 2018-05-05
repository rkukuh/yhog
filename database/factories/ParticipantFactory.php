<?php

use App\User;
use App\Models\Event;
use App\Models\Participant;
use Faker\Generator as Faker;

$factory->define(Participant::class, function (Faker $faker) {

    return [
        'creator_id' => function() {
            return factory(User::class)->create()->id;
        },
        'event_id' => function() {
            return factory(Event::class)->create()->id;
        },
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'quantity' => $faker->randomDigitNotNull,
        'price' => $faker->randomElement([0, $faker->randomDigitNotNull * 100000]),
        'response' => null,
    ];

});
