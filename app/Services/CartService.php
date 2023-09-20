<?php

namespace App\Services;

use APp\Models\User;
use App\Models\Cart;

class CartService
{
    /**
     * Calculate total price of items in the cart
     */
    public function getTotalPriceFromCart()
    {
        //Calc total from adding items in cart
        $user = Auth::user();

        //Get cart items for user logged in.
        $total = $user->cart()
            //Eager load product details ready for adding price
            ->with('productDetail')
            //Get cart items first to avoid N+1 queries
            ->get()
            //Get sum of cart items using prodict detail relationship
            ->sum(function ($item) {
                return $item->productDetail->price;
            });

        return $total;
    }

    /**
     * Remove unavailable items from the cart
     */
    public function removeUnavailableItems()
    {
        //Get all cart items
        $cartItems = Auth::user()->cart;
        //Filter for unavalible items
        $unavailableItems = $cartItems->filter(function ($item) {
            return ! $item->isAvailable();
        });

        if ($unavailableItems->count() > 0) {
            //Remove unavailable items
            $unavailableItems->each->delete();
        }
    }
}
