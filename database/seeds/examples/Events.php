<?php

use App\User;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class Events extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collection::times(25, function ($number) {

            /** Generate events data from its factory */

            $custom_date = Carbon::now()->subDays(rand(3, 5));

            $event = factory(Event::class)->create([
                'creator_id' => User::role(['admin'])->pluck('id')->random(),
                'created_at' => $custom_date,
                'updated_at' => $custom_date
            ]);

            /** Attach only one category to generated event data */

            $event->categories()
                     ->attach(
                        Category::ofEvent()->pluck('id')->random()
                    );

            /** Attach tags to generated event data */

            for ($i = 1; $i <= rand(2, 4); $i++) {

                $event->tags()
                      ->attach(
                        Tag::pluck('id')->random()
                      );
            }

        });
    }
}
