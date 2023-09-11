@extends('layouts.app')

@section('content')

<h1>Shipping Details - Total Price: £{{ $total }}</h1>
<h2>Enter Address</h2>

{{-- Form for entering address --}}
<form action="{{ route('shipping_detail.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Address Line 1</label>
        <input type="text" name="address_1" class="form-control">
    </div>

    <div class="form-group">
        <label>Town</label>
        <input type="text" name="town" class="form-control">
    </div>

    <div class="form-group">
        <label>Postcode</label>
        <input type="text" name="postcode" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">
        Go to Payment
    </button>
</form>

@endsection
