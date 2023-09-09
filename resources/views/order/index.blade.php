{{-- View previous orders for a user --}}


{{-- View an order in more detail --}}
<a href ="{{ route('order.show', ['order' => $order_id]) }}">
<button
    class="btn btn-primary"
>
View
</button>
</a>
