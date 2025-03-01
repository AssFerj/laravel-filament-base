<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (DB::table('permissions')->count() == 0) {
            Permission::create(['name' => 'access_admin', 'guard_name' => 'web']);
            Permission::create(['name' => 'user_create', 'guard_name' => 'web']);
            Permission::create(['name' => 'user_read', 'guard_name' => 'web']);
            Permission::create(['name' => 'user_update', 'guard_name' => 'web']);
            Permission::create(['name' => 'user_delete', 'guard_name' => 'web']);
            Permission::create(['name' => 'permission_create', 'guard_name' => 'web']);
            Permission::create(['name' => 'permission_read', 'guard_name' => 'web']);
            Permission::create(['name' => 'permission_update', 'guard_name' => 'web']);
            Permission::create(['name' => 'permission_delete', 'guard_name' => 'web']);
            Permission::create(['name' => 'role_create', 'guard_name' => 'web']);
            Permission::create(['name' => 'role_read', 'guard_name' => 'web']);
            Permission::create(['name' => 'role_update', 'guard_name' => 'web']);
            Permission::create(['name' => 'role_delete', 'guard_name' => 'web']);
        }
    }
}
