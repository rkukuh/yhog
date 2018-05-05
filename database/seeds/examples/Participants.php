<?php

use App\User;
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class Participants extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 11; $i <= Event::count(); $i++) {

            Collection::times(rand(1, 3), function ($times) use ($i) {

                $event = Event::get()->random();

                Event::find($i)
                        ->participants()
                        ->save(
                            factory(Participant::class)->create([
                                'creator_id' => User::role(['admin'])->pluck('id')->random(),
                                'event_id' => $event->id,
                                'price' => $event->price,
                            ])
                        );

            });
        }
    }
}
