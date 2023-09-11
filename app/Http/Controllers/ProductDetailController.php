<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(ProductDetail $productDetail)
    {
        //Show a product in more detail including its details
        $productDetail->load('product');

        return view('productDetail.show', ['productDetail' => $productDetail]);
    }
}
