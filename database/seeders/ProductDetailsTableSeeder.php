<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Hash;

class ProductDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            //Black skirt
            [
                'product_id' => 1,
                'colour' => '000000',
                //TODO: Add images and link here, and add default image for if a product doesnt have an image.
                'image' => '',
                'price' => '19.99',
                'stock' => 10,
            ],
            //Red skirt. Different price
            [
                'product_id' => 1,
                'colour' => 'ff0000',
                'image' => '',
                'price' => '24.99',
                'stock' => 10,
            ],
            //Blue skirt. Out of stock example
            [
                'product_id' => 1,
                'colour' => '0000ff',
                'image' => '',
                'price' => '15.99',
                'stock' => 0,
            ],
            // Add more products here
        ];

        foreach ($data as $productData) {
            ProductDetail::create($productData);
        }
    }
}
