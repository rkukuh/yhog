<?php

use App\User;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Donate;
use App\Models\Donation;
use Faker\Generator as Faker;

$factory->define(Donate::class, function (Faker $faker) {

    return [
        'creator_id' => function() {
            return factory(User::class)->create()->id;
        },
        'donation_id' => function() {
            return factory(Donation::class)->create()->id;
        },
        'first_name' => $faker->first_name,
        'last_name' => $faker->last_name,
        'email' => $faker->email,
        'amount' => $faker->randomElement([0, $faker->randomDigitNotNull * 100000]),
        'response' => null,
    ];

});
