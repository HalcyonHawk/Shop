<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Display in stock products.
     */
    public function index()
    {
        //Get in stock product details using scope set in model
        $productDetails = ProductDetail::inStock()
            //Eager load product name. Description not needed at this point
            ->with('product:product_id,name')
            ->simplePaginate(15);

        return view('productDetail.index', [
            'productDetails' => $productDetails
        ]);
    }

    /**
     * Display the specified product.
     */
    public function show(ProductDetail $productDetail)
    {
        //Show a product in more detail including its details
        $productDetail->load('product');

        return view('productDetail.show', ['productDetail' => $productDetail]);
    }
}
