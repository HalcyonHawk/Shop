
{{-- View items in the cart --}}
@foreach ($cartItems as $item)
    $item->productDetail->price

    {{-- Remove item from cart --}}
    <button
    class="btn btn-danger"
    data-cart-id="{{ $cartItem->cart_id }}"
    >
    Remove
    </button>

@endforeach

{{-- Go to checkout (shipping details, then payment) --}}
<button
    class="btn btn-primary"
>
Checkout
</button>
