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

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Category::factory(10)->create();
        Food::factory(10)->create();
        Customer::factory(10)->create();

        Order::factory()
            ->count(10)
            ->has(OrderItem::factory()->count(3), 'items')
            ->create()
            ->each(function ($order) {
                $order->update([
                    'total_price' => $order->items->sum(fn($i) => $i->price * $i->quantity),
                ]);
            });
    }
}
