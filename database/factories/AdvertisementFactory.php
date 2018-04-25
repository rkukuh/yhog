<?php

use Carbon\Carbon;
use App\Models\Partner;
use App\Models\Advertisement;
use Faker\Generator as Faker;

$factory->define(Advertisement::class, function (Faker $faker) {

    return [
        'partner_id' => function() {
            return factory(Partner::class)->create()->id;
        },
        'url' => $faker->url,
        'activated_at' => $faker->randomElement([null, Carbon::now()])
    ];

});
