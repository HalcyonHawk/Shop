<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Display items in the cart
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Add item to cart
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //Update quantity of an item in the cart. For now leave as just 1 allowed in cart to keep simple
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //Remove item from cart
    }
}
