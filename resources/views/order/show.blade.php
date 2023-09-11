{{-- View an order --}}
@extends('layouts.app')

@section('content')

<h1>Order - #{{ $order->order_id }}</h1>

{{-- TODO: Make component to avoid repeated code for order.index and order.show --}}
<div class="d-flex overflow-auto my-4">
    {{-- View an order in more detail --}}
    <a href="{{ route('order.show', ['order' => $order->order_id]) }}">
        <h3>#{{ $order->order_id }}</h3>
    </a>

    {{-- View previous orders for a user --}}
    @foreach ($order->productDetails as $detail)
        <div class="me-4">
            <img src="{{ $detail->image }}" width="80">
            <div>{{ $detail->product->name }}</div>
            <div class="small text-muted">#{{ $detail->product_detail_id }}</div>
        </div>
    @endforeach

</div>

@endsection
