<?php

use App\User;
use App\Models\Donate;
use App\Models\Donation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class Donates extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= Donation::count(); $i++) {

            Collection::times(rand(1, 3), function ($times) use ($i) {

                Donation::find($i)
                        ->donates()
                        ->save(
                            factory(Donate::class)->create([
                                'creator_id' => User::role(['admin'])->pluck('id')->random(),
                                'donation_id' => Donation::get()->random()->id,
                                'amount' => rand(3, 5) * 100000,
                            ])
                        );

            });
        }
    }
}
