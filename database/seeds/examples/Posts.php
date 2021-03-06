<?php

use App\User;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class Posts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collection::times(25, function ($number) {

            /** Generate posts data from its factory */

            $custom_date = Carbon::now()->subDays(rand(3, 5));

            $post = factory(Post::class)->create([
                'creator_id' => User::role(['admin'])->pluck('id')->random(),
                'created_at' => $custom_date,
                'updated_at' => $custom_date
            ]);

            /** Attach only one category to generated post data */

            $post->categories()
                     ->attach(
                        Category::ofPost()->pluck('id')->random()
                    );

            /** Attach tags to generated post data */

            for ($i = 1; $i <= rand(2, 4); $i++) {

                $post->tags()
                     ->attach(
                        Tag::pluck('id')->random()
                     );
            }

        });
    }
}
