<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** USER, ROLE, PERMISSION */
        
        $this->call(UsersTableSeeder::class);
        $this->call(RoleAndPermissionSeeder::class);

        /** POLYMORPHICS **/

        $this->call(TagsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);

        /** BLOG **/

        $this->call(PostsTableSeeder::class);
    }
}
