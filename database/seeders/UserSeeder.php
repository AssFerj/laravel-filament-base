<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (DB::table('users')->count() == 0) {
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@stoix.dev',
                'password' => Hash::make('115J1|OrMt`*'),
            ]);

            $colaborator = User::create([
                'name' => 'Funcionário',
                'email' => 'funcionario@stoix.dev',
                'password' => Hash::make('125J1|OrMt`*'),
            ]);

            $enterprise = User::create([
                'name' => 'Empresa',
                'email' => 'empresa@stoix.dev',
                'password' => Hash::make('135J1|OrMt`*'),
            ]);

            // Store the created users for use in ModelHasRoleSeeder
            $this->command->info('Users created:');
            $this->command->info('Admin ID: ' . $admin->id);
            $this->command->info('Colaborator ID: ' . $colaborator->id);
            $this->command->info('Enterprise ID: ' . $enterprise->id);
        }
    }
}
