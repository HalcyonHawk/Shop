{{-- View all products --}}


{{-- View product in more detail --}}
<a href ="{{ route('product.show', ['product' => $product_id]) }}">
<button
    class="btn btn-primary"
>
View
</button>
</a>

{{-- Add to cart --}}
<button
    class="btn btn-primary"
    {{-- TODO: add JS for button --}}
    data-product-detail-id="{{ $productDetail->product_detail_id }}"
>
Add to Cart
</button>
