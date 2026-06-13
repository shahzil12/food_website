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
    \App\Models\User::create([
        'name' => 'Admin Boss',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('12345678'),
        'role' => 0, // 0 = Admin
        'phone' => '1234567890',
        'address' => 'Headquarters, NY',
    ]);

    // 2. The Customer (The Buyer)
    \App\Models\User::create([
        'name' => 'John Customer',
        'email' => 'user@gmail.com',
        'password' => bcrypt('12345678'),
        'role' => 1, // 1 = User
        'phone' => '0987654321',
        'address' => '123 Main Street, NY',
    ]);

    // 3. The Rider (The Delivery Guy)
    \App\Models\User::create([
        'name' => 'Mike Rider',
        'email' => 'delivery@gmail.com',
        'password' => bcrypt('12345678'),
        'role' => 2, // 2 = Delivery
        'phone' => '1122334455',
        'address' => 'Rider Station, NY',
    ]);
}
}
