<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Services\CartService;

class CartController extends Controller
{
    public function __construct()
    {
        $this->cartService = new CartService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Get logged in user
        $user = Auth::user();

        //Remove unavailable items from the cart
        //TODO: Add a message to inform the user why items have been removed
        $this->cartService->removeUnavailableItems();

        //Display items in the cart for logged in user
        $cartItems = $user->cart()
            //Eager load product details to get price and code of item in the cart
            ->with('productDetail: product_detail_id ,price')
            ->get(['product_detail_id']);

        return view('cart.index', ['cartItems' => $cartItems]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Verify user is logged in, if not send to login screen
        if (auth()->guest()) {
            return redirect()->route('login');
        }

        //Check for if product detail is already in cart.
        $this->authorize('addToCart', ProductDetail::find($request->product_detail_id));
        if ($existing) {
          return redirect()->back()->with('message', 'Product already in cart. You can only buy 1 of each product');
        }

        //Add item to cart
        $input = $request->all();
        //Product added belongs to user logged in
        $input['user_id'] = Auth::user()->id;
        //Added at current time
        $input['added_at'] = now();

        Cart::create($input);

        return response('Cart updated', 201);
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
        $cart->delete();

        return response('Cart item removed', 200);
    }
}
