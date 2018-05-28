<?php

use Illuminate\Database\Seeder;
use App\Models\Contact;

class Contacts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Contact::class, 20)->create();
    }
}
