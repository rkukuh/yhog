<?php

use Faker\Generator as Faker;
use App\Models\Admin\Category;

$factory->define(Category::class, function (Faker $faker) {

    $name = 'Category Test #' . $faker->unixTime();

    return [
        'parent_id' => null,
        'name' => $name,
        'slug' => str_slug($name),
        '_of' => $faker->randomElement(['post', 'partner', 'event', 'donation'])
    ];
    
});
