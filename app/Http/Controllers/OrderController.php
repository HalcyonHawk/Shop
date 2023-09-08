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
        //Get all previous orders for the user logged in
        //TODO: Edit to only select needed fields
        $orders = Order::with('product_details')
            ->where('user_id', Auth::user()->id)
            ->orderBy('order_date', 'desc')
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //When payment successful, create order record
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //Show an order. Include details of a order
    }
}
