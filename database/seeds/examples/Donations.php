<?php

use App\User;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Donation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class Donations extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collection::times(1, function ($number) {

            /** Generate donations data from its factory */

            $custom_date = Carbon::now()->subDays(rand(3, 5));

            $donation = factory(Donation::class)->create([
                'creator_id' => User::role(['admin'])->pluck('id')->random(),
                'created_at' => $custom_date,
                'updated_at' => $custom_date
            ]);

            /** Attach only one category to generated donation data */

            $donation->categories()
                     ->attach(
                        Category::ofDonation()->pluck('id')->random()
                     );

            /** Attach tags to generated donation data */

            for ($i = 1; $i <= rand(2, 4); $i++) {

                $donation->tags()
                         ->attach(
                            Tag::pluck('id')->random()
                         );
            }

        });
    }
}
