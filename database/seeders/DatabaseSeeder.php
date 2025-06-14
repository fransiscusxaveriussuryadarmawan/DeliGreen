<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Food;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categoryNames = [
            'Appetizer',
            'Main Course',
            'Snack',
            'Dessert',
            'Coffee',
            'Non Coffee',
            'Healthy Juice',
        ];

        foreach ($categoryNames as $name) {
            Category::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => Str::random(20),
            ]);
        }

        $foods = [
            [
                'name' => 'Grilled Chicken Salad',
                'category_id' => 1,
                'price' => 35000,
                'description' => 'Healthy grilled chicken with fresh vegetables.',
            ],
            [
                'name' => 'Spaghetti Carbonara',
                'category_id' => 2,
                'price' => 42000,
                'description' => 'Classic Italian pasta with creamy sauce.',
            ],
            [
                'name' => 'Cheese Nachos',
                'category_id' => 3,
                'price' => 25000,
                'description' => 'Crispy nachos topped with melted cheese.',
            ],
            [
                'name' => 'Chocolate Lava Cake',
                'category_id' => 4,
                'price' => 30000,
                'description' => 'Decadent chocolate cake with a molten center.',
            ],
            [
                'name' => 'Espresso',
                'category_id' => 5,
                'price' => 20000,
                'description' => 'Strong and rich coffee shot.',
            ],
            [
                'name' => 'Iced Matcha Latte',
                'category_id' => 6,
                'price' => 28000,
                'description' => 'Refreshing matcha latte served cold.',
            ],
            [
                'name' => 'Fruit Smoothie Bowl',
                'category_id' => 7,
                'price' => 30000,
                'description' => 'Refreshing smoothie with mixed fruits and granola.',
            ],
        ];

        foreach ($foods as $food) {
            Food::create([
                'name' => $food['name'],
                'category_id' => $food['category_id'],
                'price' => $food['price'],
                'description' => $food['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


        User::factory(10)->create();

        User::create([
            'name' => 'Admin DeliGreen',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('masuk12345'),
            'role' => 'admin',
            'phone' => '08123456789',
            'address' => 'Kantor Pusat DeliGreen',
            'email_verified_at' => now(),
        ]);

        $userIds = User::pluck('id')->toArray();

        Order::factory()
            ->count(25)
            ->has(OrderItem::factory()->count(3), 'items')
            ->create([
                'user_id' => fake()->randomElement($userIds),
            ])
            ->each(function ($order) {
                foreach ($order->items as $item) {
                    $item->update(['user_id' => $order->user_id]);
                }

                $order->update([
                    'total_price' => $order->items->sum(fn($i) => $i->price * $i->quantity),
                ]);
            });
    }
}
