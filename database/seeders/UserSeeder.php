<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuario administrador (a prueba de duplicados)
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name'     => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'role'     => 'admin',
            ]
        );

        // Usuarios de prueba generados por factory
        User::factory()->count(20)->create();
    }
}
