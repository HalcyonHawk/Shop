@extends('layouts.app')

@section('content')

@if($products->count())

<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 col-sm-6 mb-4">
        <div class="card h-100">

            <img src="{{ $product->productDetail->image }}" class="card-img-top">

            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>

                <div>
                    <span class="me-2" style="background: {{ $product->productDetail->colour }}"></span>
                </div>

                <div class="mt-2">
                    £{{ $product->productDetail->price }}
                </div>

                {{-- Add to cart --}}
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_detail_id" value="{{ $product->productDetail }}">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>

                {{-- View details on a product --}}
                <a href ="{{ route('product_detail.show', ['product_detail' => $product->productDetail]) }}" class="btn btn-primary">
                    View Details
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{ $products->links() }}

@else

<div class="alert alert-info">No products in stock. Please check again later.</div>

@endif

@endsection
