<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();
        if ($categories->isEmpty()) {
            $this->command->info('No categories found! Please create categories before seeding products.');
            return;
        }

        Product::create([
            'name' => 'Product 1',
            'description' => 'Description for Product 1',
            'cost' => 10.00,
            'price' => 15.00,
            'category_id' => $categories->random()->id, 
            'stock' => 100,
        ]);

        Product::create([
            'name' => 'Product 2',
            'description' => 'Description for Product 2',
            'cost' => 20.00,
            'price' => 25.00,
            'category_id' => $categories->random()->id,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'Product 3',
            'description' => 'Description for Product 3',
            'cost' => 30.00,
            'price' => 35.00,
            'category_id' => $categories->random()->id,
            'stock' => 30,
        ]);

    }
}
