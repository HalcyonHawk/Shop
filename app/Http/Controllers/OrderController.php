<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Get orders for user logged in with details. Display lasted first
        $orders = Auth::user()
            ->orders()
            ->with('productDetails')
            ->latest() //orderBy desc
            ->get();

        return view('order.index', ['order' => $order]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //When payment successful

        $userId = auth()->id;

        //Create order
        $order = new Order;
        $order->user_id = $userId;
        $order->ordered_at = now();
        //Add product details to link table when saving the order
        $order->save()->attach($request->productDetailIds);

        //Get users cart
        $cartItems = auth()->user()->cart;

        foreach ($cartItems as $item) {
            //Reduce product detail stock
            ProductDetail::where('product_detail_id', $item->product_detail_id)
                ->decrement('stock');

            //Delete item from cart for the user
            $item->delete();
        }

        //After making the order, go to page to view the order
        return redirect()->route('order.show', ['order' => $order]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //Eager load product details for the order
        $order->load('productDetails');

        return view('order.show', ['order' => $order]);
    }
}
