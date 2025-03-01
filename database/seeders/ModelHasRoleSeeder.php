<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class ModelHasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $colaborateRole = Role::where('name', 'colaborator')->first();
        $enterpriseRole = Role::where('name', 'enterprise')->first();

        if (\DB::table('model_has_roles')->count() == 0) {
            $adminRole = Role::where('name', 'admin')->first();
            $colaborateRole = Role::where('name', 'colaborator')->first();
            $enterpriseRole = Role::where('name', 'enterprise')->first();

            $admin = User::where('email', 'admin@stoix.dev')->first();
            $functionary = User::where('email', 'funcionario@stoix.dev')->first();
            $enterprise = User::where('email', 'empresa@stoix.dev')->first();

            if ($admin) $admin->assignRole($adminRole);
            if ($functionary) $functionary->assignRole($colaborateRole);
            if ($enterprise) $enterprise->assignRole($enterpriseRole);
        }
    }
}
