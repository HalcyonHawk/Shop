@extends('layouts.app')

@section('content')

@if($productDetails->count())

{{-- TODO: Add filter options here --}}


<div class="row">
    {{-- Display each instock product detail.
        Display by product detail so that all variations are displayed, including different colours.  --}}
    @foreach($productDetails as $productDetail)
    <div class="col-md-4 col-sm-6 mb-4">
        <div class="card h-100">

            <img src="{{ $productDetail->image }}" class="card-img-top">

            <div class="card-body">
                <h5 class="card-title">{{ $productDetail->product->name }}</h5>

                <div>
                    <span class="me-2" style="background: {{ $productDetail->colour }}"></span>
                </div>

                <div class="mt-2">
                    £{{ $productDetail->price }}
                </div>

                {{-- Add to cart --}}
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_detail_id" value="{{ $productDetail }}">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>

                {{-- View details on a product --}}
                <a href ="{{ route('product_detail.show', ['product_detail' => $productDetail]) }}" class="btn btn-primary">
                    View Details
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{ $productDetails->links() }}

@else

<div class="alert alert-info">No products in stock. Please check again later.</div>

@endif

@endsection
