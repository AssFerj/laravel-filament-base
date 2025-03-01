<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (DB::table('roles')->count() == 0) {
            $adminRole = Role::create([
                'name' => 'admin',
                'guard_name' => 'web',
            ]);

            $colaboratorRole = Role::create([
                'name' => 'colaborator',
                'guard_name' => 'web',
            ]);

            $enterpriseRole = Role::create([
                'name' => 'enterprise',
                'guard_name' => 'web',
            ]);

            // Store the created roles for use in ModelHasRoleSeeder
            $this->command->info('Roles created:');
            $this->command->info('Admin Role ID: ' . $adminRole->id);
            $this->command->info('Colaborator Role ID: ' . $colaboratorRole->id);
            $this->command->info('Enterprise Role ID: ' . $enterpriseRole->id);
        }
    }
}
