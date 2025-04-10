<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Product::factory(100)->create()->each(function($product){
        //     ProductImage::factory(4)->create([
        //         'product_id' => $product->id,
        //     ]);

        //     ProductImage::factory(1)->create([
        //         'product_id' => $product->id,
        //         'is_thumbnail' => true,
        //     ]);
        // });
    }
}
