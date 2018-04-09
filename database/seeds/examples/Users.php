<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Create a 'guest' user
         */
        factory(User::class, 5)
            ->create()
            ->each(function ($user) {
                $user->assignRole(
                    Role::where('name', 'guest')->first()
                );
            });
    }
}
