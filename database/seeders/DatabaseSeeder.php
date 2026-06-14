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

    // 4. Seed Categories
    $pizzaCat = \App\Models\Category::firstOrCreate(
        ['name' => 'Pizza'],
        ['image' => 'pizza_cat.png']
    );

    $burgerCat = \App\Models\Category::firstOrCreate(
        ['name' => 'Burgers'],
        ['image' => 'burger_cat.png']
    );

    $dessertCat = \App\Models\Category::firstOrCreate(
        ['name' => 'Desserts'],
        ['image' => 'dessert_cat.png']
    );

    $drinkCat = \App\Models\Category::firstOrCreate(
        ['name' => 'Drinks'],
        ['image' => 'drink_cat.png']
    );

    // 5. Seed Food Items
    // Margherita Pizza
    \App\Models\Food::firstOrCreate(
        ['title' => 'Margherita Pizza'],
        [
            'description' => 'Classic delight with 100% real mozzarella cheese, fresh tomatoes, and basil.',
            'price' => '12.99',
            'image' => 'margherita.png',
            'category' => (string)$pizzaCat->id,
        ]
    );

    // Pepperoni Pizza
    \App\Models\Food::firstOrCreate(
        ['title' => 'Pepperoni Pizza'],
        [
            'description' => 'Loaded with double pepperoni, mozzarella cheese, and signature tomato sauce.',
            'price' => '14.99',
            'image' => 'pepperoni.png',
            'category' => (string)$pizzaCat->id,
        ]
    );

    // Cheeseburger
    \App\Models\Food::firstOrCreate(
        ['title' => 'Cheeseburger'],
        [
            'description' => 'Juicy beef patty, melted cheddar cheese, lettuce, tomato, onions, and special sauce.',
            'price' => '8.99',
            'image' => 'cheeseburger.png',
            'category' => (string)$burgerCat->id,
        ]
    );

    // Crispy Chicken Burger
    \App\Models\Food::firstOrCreate(
        ['title' => 'Crispy Chicken Burger'],
        [
            'description' => 'Crispy chicken breast, spicy mayo, pickles, and shredded lettuce.',
            'price' => '9.99',
            'image' => 'chicken_burger.png',
            'category' => (string)$burgerCat->id,
        ]
    );

    // Chocolate Lava Cake
    \App\Models\Food::firstOrCreate(
        ['title' => 'Chocolate Lava Cake'],
        [
            'description' => 'Warm chocolate cake with a molten chocolate center, served with vanilla ice cream.',
            'price' => '6.99',
            'image' => 'lava_cake.png',
            'category' => (string)$dessertCat->id,
        ]
    );

    // Strawberry Cheesecake
    \App\Models\Food::firstOrCreate(
        ['title' => 'Strawberry Cheesecake'],
        [
            'description' => 'Creamy New York style cheesecake topped with sweet strawberry sauce.',
            'price' => '7.99',
            'image' => 'cheesecake.png',
            'category' => (string)$dessertCat->id,
        ]
    );

    // Iced Caramel Macchiato
    \App\Models\Food::firstOrCreate(
        ['title' => 'Iced Caramel Macchiato'],
        [
            'description' => 'Freshly brewed espresso with milk, sweet caramel syrup, and ice.',
            'price' => '4.49',
            'image' => 'macchiato.png',
            'category' => (string)$drinkCat->id,
        ]
    );

    // Fresh Mint Lemonade
    \App\Models\Food::firstOrCreate(
        ['title' => 'Fresh Mint Lemonade'],
        [
            'description' => 'Refreshing blend of fresh lemon juice, mint leaves, sugar, and crushed ice.',
            'price' => '3.49',
            'image' => 'lemonade.png',
            'category' => (string)$drinkCat->id,
        ]
    );
}
}
