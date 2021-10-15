<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use DB;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();
        $admin = Role::whereName('Admin')->first();

        foreach ($permissions as $permission) {
            DB::table('role_permission')->insert([
                'role_id' => $admin->id,
                'permission_id' => $permission->id,
            ]);
        };

        $editor = Role::whereName('Editor')->first();

        foreach ($permissions as $permission) {
            if(!in_array($permission->name, ['edit_roles'])){
                DB::table('role_permission')->insert([
                    'role_id' => $editor->id,
                    'permission_id' => $permission->id
                ]);
            };
        }

        $guest = Role::whereName('Guest')->first();
        $viewRoles = ['view_users', 'view_roles'];

        foreach ($permissions as $permission) {
            if(in_array($permission->name, $viewRoles)){
                DB::table('role_permission')->insert([
                    'role_id' => $guest->id,
                    'permission_id' => $permission->id
                ]);
            };
        }
    }
}
