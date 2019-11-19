<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'title' => 'Prueba',
            'price' => 1,
            'stock' => 1,
            'sku' => 'Prueba',
            'image' => 'Prueba',
            'description' => 'Prueba',
        ]);
    }
}
