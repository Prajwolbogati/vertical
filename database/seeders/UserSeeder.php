<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =  User::create([
            'name' => 'Webtech',
            'email' => 'prajwolbogati9@gmail.com',
            'password' => Hash::make('webtech123@#$'),
            'email_verified_at' =>'2021-10-01 00:00:00' ,
        ]);
        $role = Role::where('id', 1)->first();
        $user->syncRoles($role);
    }
}
