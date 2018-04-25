<?php

use Carbon\Carbon;
use App\Models\Partner;
use App\Models\Advertisement;
use Illuminate\Database\Seeder;

class Advertisements extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 21; $i <= Partner::count(); $i++) {

            factory(Advertisement::class)->create([
                'partner_id' => $i
            ]);
        }

        // Deactivate all Ad Unit
        Advertisement::query()->update(['activated_at' => null]);

        // Activate only one Ad Unit, randomly
        Advertisement::get()->random()->update(['activated_at' => Carbon::now()]);
    }
}
