<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if users table exists and is empty, then seed
        if (Schema::hasTable('users') && User::count() === 0) {
            $this->seed();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }

    /**
     * Seed default users
     */
    private function seed(): void
    {
        // 1. The Admin
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Boss',
                'password' => bcrypt('12345678'),
                'role' => 0,
                'phone' => '1234567890',
                'address' => 'Headquarters, NY',
            ]
        );

        // 2. The Customer
        User::firstOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'John Customer',
                'password' => bcrypt('12345678'),
                'role' => 1,
                'phone' => '0987654321',
                'address' => '123 Main Street, NY',
            ]
        );

        // 3. The Delivery Guy
        User::firstOrCreate(
            ['email' => 'delivery@gmail.com'],
            [
                'name' => 'Mike Rider',
                'password' => bcrypt('12345678'),
                'role' => 2,
                'phone' => '1122334455',
                'address' => 'Rider Station, NY',
            ]
        );
    }
};
