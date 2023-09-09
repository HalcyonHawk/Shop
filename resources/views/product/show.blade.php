{{-- View a product including its description --}}


{{-- Use JS to change product detail --}}


{{-- Include button to add to cart --}}
<button
    class="btn btn-primary"
    {{-- TODO: add JS for button --}}
    data-product-detail-id="{{ $productDetail->product_detail_id }}"
>
Add to Cart
</button>
