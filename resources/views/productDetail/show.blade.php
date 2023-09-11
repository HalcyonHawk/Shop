@extends('layouts.app')

@section('content')

{{-- View a product including its description --}}
<div class="row">
    {{-- Normally split image and product info 50:50, unless small screen then do image first and other details under --}}
    <div class="col-md-6 col-xs-12">
        <img src="{{ $productDetail->image }}" class="img-fluid">
    </div>

    <div class="col-md-6 col-xs-12">

        <h2>{{ $productDetail->product->name }}</h2>

        <div class="text-primary fw-bold">
        £{{ $productDetail->price }}
        </div>

        <div class="mt-3">
        {{-- Go through all in stock product details for the product using model attribute --}}
        @foreach ($productDetail->product->in_stock_product_details as $detail)
            <a href="{{ route('product_detail.show', ['product_detail' => $detail]) }}"
                class="me-2"
                {{-- Add a boarder for the currently selected product detail --}}
                style="border: {{ $detail->product_detail_id == $productDetail->product_detail_id ? '2px solid black' : '' }}; background: {{ $detail->colour }}">
            </a>
        @endforeach
        </div>

        {{-- Add to cart --}}
        <form action="{{ route('cart.store') }}" method="POST">
            @csrf
            <input type="hidden" name="product_detail_id" value="{{ $productDetail->product_detail_id }}">
            <button type="submit" class="btn btn-primary">Add to Cart</button>
        </form>

    </div>
</div>

{{-- Description could be long so put in under --}}
<div class="row">
    <div class="col-md-12">
        {{ $productDetail->product->description }}
    </div>
</div>

@endsection
