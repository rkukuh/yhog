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
        
        $parent_post_category = factory(CategoryModel::class)->states('post')->create();

        factory(CategoryModel::class, rand(5, 10))->states('post')->create([
            'parent_id' => $parent_post_category
        ]);

        /** EVENT **/
        
        $parent_event_category = factory(CategoryModel::class)->states('event')->create();

        factory(CategoryModel::class, rand(5, 10))->states('event')->create([
            'parent_id' => $parent_event_category
        ]);

        /** GALLERY **/
        
        $parent_gallery_category = factory(CategoryModel::class)->states('gallery')->create();

        factory(CategoryModel::class, rand(5, 10))->states('gallery')->create([
            'parent_id' => $parent_gallery_category
        ]);

        /** PARTNER **/
        
        $parent_partner_category = factory(CategoryModel::class)->states('partner')->create();

        factory(CategoryModel::class, rand(5, 10))->states('partner')->create([
            'parent_id' => $parent_partner_category
        ]);

        /** DONATION **/
        
        $parent_donation_category = factory(CategoryModel::class)->states('donation')->create();

        factory(CategoryModel::class, rand(5, 10))->states('donation')->create([
            'parent_id' => $parent_donation_category
        ]);
    }
}
