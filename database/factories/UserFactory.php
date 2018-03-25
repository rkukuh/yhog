<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {

    $first_name = $faker->firstName;
    $last_name  = $faker->lastName; 
    
    return [
        'name' => $first_name . ' ' . $last_name,
        'email' => strtolower($first_name . '.' . $last_name) . '@yhog.example',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];

});
