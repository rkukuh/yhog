<?php

use Faker\Generator as Faker;
use App\Models\Admin\Category;

$factory->define(Category::class, function (Faker $faker) {

    $name = 'Category #' . $faker->unixTime();

    return [
        'parent_id' => null,
        'name' => $name,
        'slug' => str_slug($name),
        '_of' => $faker->randomElement(['blog', 'partner', 'event', 'donation'])
    ];
    
});


$factory->state(Category::class, 'blog', ['_of' => 'blog']);
$factory->state(Category::class, 'event', ['_of' => 'event']);
$factory->state(Category::class, 'partner', ['_of' => 'partner']);
$factory->state(Category::class, 'donation', ['_of' => 'donation']);