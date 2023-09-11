<?php

namespace App\Policies;

use App\Models\User;

class CartPolicy
{
    /**
     * A user can only buy 1 of an product detail at a time
     */
    public function addToCart(User $user, ProductDetail $productDetail)
    {
        return ! $user->cart()
            ->where('product_detail_id', $productDetail->product_detail_id)
            ->exists();
    }
}
