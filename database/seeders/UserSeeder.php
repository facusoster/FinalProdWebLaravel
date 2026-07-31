<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin Sweet Store',
                'email' => 'admin@sweetstore.test',
                'role' => 'admin',
            ],
            [
                'name' => 'Cliente Demo',
                'email' => 'cliente@sweetstore.test',
                'role' => 'cliente',
            ],
            [
                'name' => 'Vendedor Demo',
                'email' => 'vendedor@sweetstore.test',
                'role' => 'vendedor',
            ],
            [
                'name' => 'María González',
                'email' => 'maria.gonzalez@sweetstore.test',
                'role' => 'cliente',
            ],
            [
                'name' => 'Juan Pérez',
                'email' => 'juan.perez@sweetstore.test',
                'role' => 'cliente',
            ],
            [
                'name' => 'Lucía Fernández',
                'email' => 'lucia.fernandez@sweetstore.test',
                'role' => 'cliente',
            ],
            [
                'name' => 'Diego Torres',
                'email' => 'diego.torres@sweetstore.test',
                'role' => 'cliente',
            ],
            [
                'name' => 'Sofía Ramírez',
                'email' => 'sofia.ramirez@sweetstore.test',
                'role' => 'cliente',
            ],
            [
                'name' => 'Martín López',
                'email' => 'martin.lopez@sweetstore.test',
                'role' => 'cliente',
            ],
            [
                'name' => 'Valentina Silva',
                'email' => 'valentina.silva@sweetstore.test',
                'role' => 'cliente',
            ],
            [
                'name' => 'Nicolás Díaz',
                'email' => 'nicolas.diaz@sweetstore.test',
                'role' => 'cliente',
            ],
            [
                'name' => 'Camila Ruiz',
                'email' => 'camila.ruiz@sweetstore.test',
                'role' => 'cliente',
            ],
            [
                'name' => 'Agustín Morales',
                'email' => 'agustin.morales@sweetstore.test',
                'role' => 'cliente',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => Hash::make('password123'),
                    'role' => $user['role'],
                    'email_verified_at' => now(),
                ]
            );
        }
    }
}
