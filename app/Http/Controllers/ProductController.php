<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //No longer used. Original plan to display a product but thought itd be better to show all variations of it
    //so products now displayed using ProductDetailController
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //Display all products

    //     //Moved to model attribute to keep controller clean
    //     //Load relationship using with to eager load
    //     //Use has for getting products that have at least 1 in stock detail
    //     // $products = Product::has('productDetails')->with(['productDetails' => function ($query) {
    //     //     //Only get products that are in stock
    //     //     $query->where('stock', '>', 0);
    //     // //Only get needed fields
    //     // }])->get(['product_id', 'name', 'productDetails.image', 'productDetails.colour', 'productDetails.price']);

    //     $products = Product::get(['name', 'in_stock_product_details'])
    //         ->simplePaginate(15);


    //     return view('product.index', ['products' => $products]);
    // }
}
