<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Category as CategoryModel;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** BLOG **/
        
        $parent_blog_category = factory(CategoryModel::class)->states('blog')->create();

        factory(CategoryModel::class, rand(5, 10))->states('blog')->create([
            'parent_id' => $parent_blog_category
        ]);
    }
}
