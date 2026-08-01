<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::orderBy('id')->get();

        $addressTemplates = [
            [
                'street' => 'Av. Siempre Viva 123',
                'city' => 'Córdoba',
                'province' => 'Córdoba',
                'postal_code' => '5000',
                'country' => 'Argentina',
            ],
            [
                'street' => 'Belgrano 456',
                'city' => 'Rosario',
                'province' => 'Santa Fe',
                'postal_code' => '2000',
                'country' => 'Argentina',
            ],
            [
                'street' => 'San Martín 789',
                'city' => 'Mendoza',
                'province' => 'Mendoza',
                'postal_code' => '5500',
                'country' => 'Argentina',
            ],
        ];

        foreach ($users as $index => $user) {
            $count = $index % 3 === 0 ? 3 : ($index % 3 === 1 ? 2 : 1);

            for ($i = 0; $i < $count; $i++) {
                $address = $addressTemplates[$i % count($addressTemplates)];

                DB::table('addresses')->updateOrInsert(
                    [
                        'user_id' => $user->id,
                        'street' => $address['street'],
                        'city' => $address['city'],
                    ],
                    [
                        'province' => $address['province'],
                        'postal_code' => $address['postal_code'],
                        'country' => $address['country'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
        }
    }
}
