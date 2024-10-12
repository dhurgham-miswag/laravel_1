<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            Customer::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
            ]);
        }
    }
}
