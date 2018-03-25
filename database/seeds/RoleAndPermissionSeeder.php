<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** ADMIN **/

        $admin = Role::create(['name' => 'admin']);

        $admin->givePermissionTo(
            Permission::create(['name' => 'create-user'])
        );

        $admin->givePermissionTo(
            Permission::create(['name' => 'edit-user'])
        );

        $admin->givePermissionTo(
            Permission::create(['name' => 'remove-user'])
        );

        /** GUEST **/

        Role::create(['name' => 'guest']);
    }
}
