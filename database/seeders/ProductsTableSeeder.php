<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Tennis skirt',
                'description' => "
                    Main features
                    - bodycon fit
                    - high waisted
                    - pleated
                    - belt loops
                    - hidden zipper on the side
                    - non-translucent fabric
                    - viscose, polyester & elastane blend

                    This skirt goes perfectly with everything. A shirt or maybe a T-shirt with a print? Nothing limits you!

                    Especially if it has belt loops that will allow you to play around with different chains and belts!

                    This skirt is ideal for school outfits, party outfits, work outfits... The only limit is your imagination. Don't be afraid to play around! We're sure you'll make a great look out of it.

                    It features a high-waisted tight fit, flowy bottom and hidden zipper on the side.
                ",
            ],
            // Add more products here
        ];

        foreach ($data as $productData) {
            Product::create($productData);
        }
    }
}
