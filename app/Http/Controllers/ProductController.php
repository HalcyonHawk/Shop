<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Display all products

        //Moved to model attribute to keep controller clean
        //Load relationship using with to eager load
        //Use has for getting products that have at least 1 in stock detail
        // $products = Product::has('productDetails')->with(['productDetails' => function ($query) {
        //     //Only get products that are in stock
        //     $query->where('stock', '>', 0);
        // //Only get needed fields
        // }])->get(['product_id', 'name', 'productDetails.image', 'productDetails.colour', 'productDetails.price']);

        $products = Product::get(['name', 'in_stock_product_details']);


        return view('product.index', ['products' => $products]);

        //View notes
        // foreach ($products as $product) {
        //     $product->name;

        //     foreach ($product->in_stock_product_details as $detail) {
        //       $detail->color;
        //       $detail->price;
        //     }
        //   }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //Show a product in more detail including its details
        //Moved logic to model attribute to avoid repeating code
        //$product = Product::with('productDetails')->find($product);

        return view('product.show', ['product' => $product]);

        //View notes
        // foreach ($product->productDetails as $detail) {
        //     $detail->color;
        //     $detail->price;
        // }
    }
}
