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
        Product::Where()
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //Show a product in more detail
    }
}
