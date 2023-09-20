@extends('layouts.app')

@section('content')

<h1>Cart</h1>

@if($cartItems->count())

<table class="table">
  <thead>
    <tr>
      <th>Product</th>
      <th>Price</th>
      <th></th>
    </tr>
  </thead>

  <tbody>
    {{-- View items in the cart --}}
    @foreach ($cartItems as $item)
      <tr>
        <td>
          {{ $item->productDetail->product->name }}
        </td>
        <td>
          {{ $item->productDetail->price }}
        </td>
        {{-- Remove item from cart --}}
        <td>
            <form action="{{ route('cart.destroy', $item) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
            </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

{{-- Go to checkout (shipping details, then payment) --}}
<div>
  <a href="{{ route('shipping_detail.create') }}" class="btn btn-primary">Checkout</a>
</div>

@else
<div class="alert alert-info">No items in cart</div>
@endif

@endsection
