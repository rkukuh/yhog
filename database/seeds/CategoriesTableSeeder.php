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
        /** Post **/

        Category::create([
            'name' => 'Uncategorized',
            'slug' => 'uncategorized',
            '_of'  => 'post'
        ]);

        /** Event **/

        Category::create([
            'name' => 'Uncategorized',
            'slug' => 'uncategorized',
            '_of'  => 'event'
        ]);

        /** Partner **/

        Category::create([
            'name' => 'Uncategorized',
            'slug' => 'uncategorized',
            '_of'  => 'partner'
        ]);

        Category::create([
            'name' => 'Event Sponsor',
            'slug' => 'event-sponsor',
            '_of'  => 'partner'
        ]);

        /** Donation **/

        Category::create([
            'name' => 'Uncategorized',
            'slug' => 'uncategorized',
            '_of'  => 'donation'
        ]);

        /** Gallery **/

        Category::create([
            'name' => 'Uncategorized',
            'slug' => 'uncategorized',
            '_of'  => 'gallery'
        ]);
    }
}
