<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user1 = User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
            'is_admin' => true
        ]);
        Listing::factory(20)->create([
            'user_id' => $user1->id
        ]);
        $user2 = User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@example.com',
        ]);
        Listing::factory(10)->create([
            'user_id' => $user2->id
        ]);
    }
}
