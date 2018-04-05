<?php

use App\User;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Models\Partner as PartnerModel;

class Partner extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collection::times(25, function ($number) {

            /** Generate partners data from its factory */

            $custom_date = Carbon::now()->subDays(rand(3, 5));

            $partner = factory(PartnerModel::class)->create([
                'user_id' => User::role(['admin'])->pluck('id')->random(),
                'created_at' => $custom_date,
                'updated_at' => $custom_date
            ]);

            /** Attach only one category to generated partner data */

            $partner->categories()
                     ->attach(
                        Category::pluck('id')->random()
                    );

            /** Attach tags to generated partner data */

            for ($i = 1; $i <= rand(2, 4); $i++) {

                $partner->tags()
                     ->attach(
                        Tag::pluck('id')->random()
                     );
            }

        });
    }
}
