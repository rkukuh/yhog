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
        
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(UsersTableSeeder::class);

        /** POLYMORPHICS **/

        $this->call(TagsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);

        /** BLOG **/

        $this->call(PostsTableSeeder::class);

        /** EVENT **/

        $this->call(EventsTableSeeder::class);

        /** PARTNER **/

        $this->call(PartnersTableSeeder::class);

        /** DONATION **/

        $this->call(DonationsTableSeeder::class);
        $this->call(DonatesTableSeeder::class);

        /** GALLERY **/

        $this->call(GalleriesTableSeeder::class);
    }
}
