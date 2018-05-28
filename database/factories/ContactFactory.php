<?php

use App\Models\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {

    $name = $faker->name;

    return [
        'name' => $name,
        'email' => str_slug($name) . '@yhog.example',
        'message' => $faker->sentence,
    ];
    
});
