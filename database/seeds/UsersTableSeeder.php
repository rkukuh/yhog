<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@yhog.example',
            'password' => bcrypt('admin'),
        ]);

        $user->assignRole(
            Role::where('name', 'admin')->first()
        );

        $user = User::create([
            'name' => 'Yayasan HOG',
            'email' => 'yayasanhog@gmail.com',
            'password' => bcrypt('yHoG2)!8'),
        ]);

        $user->assignRole(
            Role::where('name', 'admin')->first()
        );
    }
}
