<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
   public function run(): void
{
    // 1. The Admin (You)
    \App\Models\User::firstOrCreate(
        ['email' => 'admin@gmail.com'],
        [
            'name' => 'Admin Boss',
            'password' => bcrypt('12345678'),
            'role' => 0, // 0 = Admin
            'phone' => '1234567890',
            'address' => 'Headquarters, NY',
        ]
    );

    // 2. The Customer (The Buyer)
    \App\Models\User::firstOrCreate(
        ['email' => 'user@gmail.com'],
        [
            'name' => 'John Customer',
            'password' => bcrypt('12345678'),
            'role' => 1, // 1 = User
            'phone' => '0987654321',
            'address' => '123 Main Street, NY',
        ]
    );

    // 3. The Rider (The Delivery Guy)
    \App\Models\User::firstOrCreate(
        ['email' => 'delivery@gmail.com'],
        [
            'name' => 'Mike Rider',
            'password' => bcrypt('12345678'),
            'role' => 2, // 2 = Delivery
            'phone' => '1122334455',
            'address' => 'Rider Station, NY',
        ]
    );
}
}
