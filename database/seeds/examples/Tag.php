<?php

use App\Models\Tag as TagModel;
use Illuminate\Database\Seeder;

class Tag extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TagModel::class, 10)->create();
    }
}
