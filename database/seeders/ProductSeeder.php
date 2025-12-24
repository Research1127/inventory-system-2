<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::Create([
            'name' => 'Keyboard Gaming',
            'description' => 'This is a keyboard for gaming.',
            'price' => 40.00,
            'stock' => 5,
        ]);
        Product::Create([
            'name' => 'Mouse Gaming',
            'description' => 'This is a mouse for gaming.',
            'price' => 20.00,
            'stock' => 15,
        ]);
        Product::Create([
            'name' => 'Monitor',
            'description' => 'This is a Monitor to play the game.',
            'price' => 270.00,
            'stock' => 1,
        ]);
    }
}
