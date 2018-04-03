<?php

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {

    $name = 'Category #' . $faker->unixTime();

    return [
        'parent_id' => null,
        'name' => $name,
        'slug' => str_slug($name),
        '_of' => $faker->randomElement(['post', 'partner', 'event', 'donation'])
    ];
    
});


$factory->state(Category::class, 'post', ['_of' => 'post']);
$factory->state(Category::class, 'event', ['_of' => 'event']);
$factory->state(Category::class, 'gallery', ['_of' => 'gallery']);
$factory->state(Category::class, 'partner', ['_of' => 'partner']);
$factory->state(Category::class, 'donation', ['_of' => 'donation']);