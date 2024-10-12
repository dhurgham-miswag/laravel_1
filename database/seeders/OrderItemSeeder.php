<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;

class OrderItemSeeder extends Seeder
{
    public function run()
    {
        $orders = Order::all();
        $products = Product::all();

        if ($orders->isEmpty() || $products->isEmpty()) {
            echo "No orders or products found! Please create orders and products before seeding order items.\n";
            return;
        }

        foreach ($orders as $order) {
            $order->products()->attach(
                $products->random(3)->pluck('id'), 
                ['quantity' => rand(1, 5)] 
            );
        }
    }
}
