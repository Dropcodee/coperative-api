<?php

use Illuminate\Database\Seeder;
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
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'create roles and permissions']);
        Permission::create(['name' => 'give roles & permissions']);
        Permission::create(['name' => 'delete roles & permissions']);
        Permission::create(['name' => 'view all users']);
        Permission::create(['name' => 'view user application']);
        Permission::create(['name' => 'apply for loans']);
        Permission::create(['name' => 'approve and disapprove memberships']);
        Permission::create(['name' => 'approve and disapprove loans']);
        Permission::create(['name' => 'view accounts']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'member']);
        $role->givePermissionTo('apply for loans');

        // or may be done by chaining
        $role = Role::create(['name' => 'admin'])
            ->givePermissionTo([
                'view accounts',
                'approve and disapprove memberships',
                'view user application',
                'create users',
                'view all users',
            ]);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo([
                'view accounts',
                'approve and disapprove memberships',
                'view user application',
                'create users',
                'view all users',
                'give roles & permissions',
                'approve and disapprove loans'
            ]);
         $role = Role::create(['name' => 'developer']);
         $role->givePermissionTo([
                'create users',
                'view all users',
                'give roles & permissions',
                'create roles and permissions',
                'delete roles & permissions'
         ]);
    }
}
