@extends('layouts.app')

@section('content')

<h1>Payment - Total Price: £{{ $total }}</h1>

{{-- Form for entering card details --}}
<form action="{{ route('payment.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Card Number</label>
        <input type="text" name="card_number" class="form-control">
    </div>

    <div class="form-group">
        <label>Expiration (MM/YY)</label>
        <input type="text" name="expiration" class="form-control">
    </div>

    <div class="form-group">
        <label>CVC</label>
        <input type="text" name="cvc" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">
        Pay £{{ $total }}
    </button>
</form>

@endsection
