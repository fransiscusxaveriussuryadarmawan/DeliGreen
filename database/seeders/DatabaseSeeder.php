<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Food;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\OrderItem;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a specific category name
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

        User::factory(10)->create();
        Food::factory(25)->create();
        Customer::factory(25)->create();

        Order::factory()
            ->count(25)
            ->has(OrderItem::factory()->count(3), 'items')
            ->create()
            ->each(function ($order) {
                $order->update([
                    'total_price' => $order->items->sum(fn($i) => $i->price * $i->quantity),
                ]);
            });
    }
}
