<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        $clientes = User::where('role', 'cliente')->get();

        foreach ($clientes as $cliente) {
            Address::create([
                'user_id' => $cliente->id,
                'street' => 'Calle Falsa 123',
                'city' => 'Buenos Aires',
                'province' => 'Buenos Aires',
                'postal_code' => '1000',
                'country' => 'Argentina',
            ]);
        }
    }
}
