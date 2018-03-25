<?php

use App\User as UserModel;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class User extends Seeder
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
        factory(UserModel::class, 5)
            ->create()
            ->each(function ($user) {
                $user->assignRole(
                    Role::where('name', 'guest')->first()
                );
            });
    }
}
