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
        Permission::create(['name' => 'Create']);
        Permission::create(['name' => 'Read']);
       Permission::create(['name' => 'Update']);
        Permission::create(['name' =>  'Delete']);
        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo('Create');
    }
}
