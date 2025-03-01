<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        if (DB::table('role_has_permissions')->count() == 0) {
            $adminPermissions = [
                'access_admin', 'user_create', 'user_read', 'user_update', 'user_delete',
                'permission_create', 'permission_read', 'permission_update', 'permission_delete',
                'role_create', 'role_read', 'role_update', 'role_delete'
            ];

            $colaboratorPermissions = [
                'access_admin', 'user_read'
            ];

            $enterprisePermissions = [
                'access_admin', 'user_read', 'permission_read', 'role_read'
            ];

            $permissionsByRole = [
                'admin' => $adminPermissions,
                'colaborator' => $colaboratorPermissions,
                'enterprise' => $enterprisePermissions
            ];

            $insertPermissions = fn ($role) => collect($permissionsByRole[$role])
                ->map(function ($name) {
                    $existingPermission = DB::table('permissions')
                        ->where('name', $name)
                        ->where('guard_name', 'web')
                        ->first();

                    if ($existingPermission) {
                        return $existingPermission->id;
                    }

                    return DB::table('permissions')->insertGetId([
                        'name' => $name,
                        'guard_name' => 'web',
                    ]);
                })
                ->toArray();


            $permissionIdsByRole = [
                'admin' => $insertPermissions('admin'),
                'colaborator' => $insertPermissions('colaborator'),
                'enterprise' => $insertPermissions('enterprise')
            ];

            foreach ($permissionIdsByRole as $role => $permissionIds) {
                $role = Role::whereName($role)->first();

                DB::table('role_has_permissions')
                    ->insert(
                        collect($permissionIds)->map(fn ($id) => [
                            'role_id' => $role->id,
                            'permission_id' => $id
                        ])->toArray()
                    );
            }
        }
    }
}
