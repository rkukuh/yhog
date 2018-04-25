<?php

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
        for ($i = 1; $i <= Partner::count(); $i++) {

            factory(Advertisement::class)->create([
                'partner_id' => $i
            ]);
        }
    }
}
