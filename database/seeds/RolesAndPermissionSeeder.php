<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'enter secret layer']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'create roles and permissions']);
        Permission::create(['name' => 'give roles & permissions']);
        Permission::create(['name' => 'delete roles & permissions']);
        Permission::create(['name' => 'view all users']);
        Permission::create(['name' => 'view user membership application']);
        Permission::create(['name' => 'apply for loans']);
        Permission::create(['name' => 'approve and disapprove memberships']);
        Permission::create(['name' => 'approve and disapprove loans']);
        Permission::create(['name' => 'view accounts']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role1 = Role::create(['name' => 'member']);
        $role1->givePermissionTo('apply for loans');

        // or may be done by chaining
        $role2 = Role::create(['name' => 'admin'])
            ->givePermissionTo([
                'enter secret layer',
                'view accounts',
                'approve and disapprove memberships',
                'view user application',
                'create users',
                'view all users',
            ]);

        $role3 = Role::create(['name' => 'super-admin']);
        $role3->givePermissionTo([
            'enter secret layer',
            'view accounts',
            'approve and disapprove memberships',
            'view user application',
            'create users',
            'view all users',
            'give roles & permissions',
            'approve and disapprove loans'
        ]);
        $role4 = Role::create(['name' => 'developer']);
        $role4->givePermissionTo([
            'enter secret layer',
            'create users',
            'view all users',
            'give roles & permissions',
            'create roles and permissions',
            'delete roles & permissions'
        ]);
        # create starter users
        $user = User::create([
            'first_name' => 'owolabi',
            'last_name' => 'joshua',
            'email' => 'dropcodetuts@gmail.com',
            'phone_number' => '09013747651',
            'guarantor_mail' => 'invalid@gmail.com',
            'password' => Hash::make('passcode'),
            'verification_token' => Str::random(60)
        ]);
        $user->assignRole($role3);
        $user = User::create([
            'first_name' => 'adeojo',
            'last_name' => 'emmanuel',
            'email' => 'emmanuel.adeojo.ibk@gmail.com',
            'phone_number' => '08023458419',
            'guarantor_mail' => 'invalidguarantor@gmail.com',
            'password' => Hash::make('passcode'),
            'verification_token' => Str::random(60)
        ]);
        $user->assignRole($role2);

        $user = User::create([
            'first_name' => 'tasha',
            'last_name' => 'roberts',
            'email' => 'tasharoberts@gmail.com',
            'phone_number' => '08026458419',
            'guarantor_mail' => 'mikeroberts@gmail.com',
            'password' => Hash::make('passcode'),
            'verification_token' => Str::random(60)
        ]);
        $user->assignRole($role1);

        $user = User::create([
            'first_name' => 'dropcode',
            'last_name' => 'joshua',
            'email' => 'joshuadropcode@gmail.com',
            'phone_number' => '08022458419',
            'guarantor_mail' => 'joshuadropcode@gmail.com',
            'password' => Hash::make('passcode'),
            'verification_token' => Str::random(60)
        ]);
        $user->assignRole($role4);
    }
}
