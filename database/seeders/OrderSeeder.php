<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Customer;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (Customer::all() as $customer) {
            for ($i = 0; $i < 5; $i++) {
                Order::create([
                    'customer_id' => $customer->id,
                    'status' => $faker->randomElement(['pending', 'completed', 'cancelled']),
                    'total_amount' => $faker->randomFloat(2, 50, 500),
                    'created_at' => now()->subDays(rand(0, 30)),
                ]);
            }
        }
    }
}
