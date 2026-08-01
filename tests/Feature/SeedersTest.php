<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class SeedersTest extends TestCase
{
    use RefreshDatabase;

    public function test_database_seeder_populates_core_tables(): void
    {
        Artisan::call('db:seed', ['--class' => 'DatabaseSeeder']);

        $this->assertDatabaseCount('users', 3);
        $this->assertDatabaseCount('categories', 4);
        $this->assertDatabaseCount('products', 6);
    }
}
