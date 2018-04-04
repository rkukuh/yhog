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
        $this->call(User::class);

        $this->call(Category::class);
        $this->call(Tag::class);
        
        $this->call(Post::class);
    }
}
