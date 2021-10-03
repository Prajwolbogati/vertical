<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleandpermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'read permission']);
       Permission::create(['name' => 'update permission']);
        Permission::create(['name' =>  'delete permission']);




        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('create permission');
    }
}
