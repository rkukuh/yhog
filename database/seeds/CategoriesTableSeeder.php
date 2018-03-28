<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Uncategorized',
            'slug' => 'uncategorized',
            '_of'  => 'post'
        ]);

        Category::create([
            'name' => 'Uncategorized',
            'slug' => 'uncategorized',
            '_of'  => 'event'
        ]);

        Category::create([
            'name' => 'Uncategorized',
            'slug' => 'uncategorized',
            '_of'  => 'gallery'
        ]);

        Category::create([
            'name' => 'Uncategorized',
            'slug' => 'uncategorized',
            '_of'  => 'partner'
        ]);

        Category::create([
            'name' => 'Uncategorized',
            'slug' => 'uncategorized',
            '_of'  => 'donation'
        ]);
    }
}
