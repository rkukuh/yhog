<?php

use Illuminate\Database\Seeder;

class ExampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** USER, ROLE, PERMISSION */

        $this->call(User::class);

        /** POLYMORPHICS **/

        $this->call(Tag::class);
        $this->call(Image::class);
        $this->call(Category::class);
        
        /** BLOG **/
        
        $this->call(Post::class);

        /** EVENT **/

        $this->call(Event::class);

        /** PARTNER **/

        $this->call(Partner::class);
    }
}
