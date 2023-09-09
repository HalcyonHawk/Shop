<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Enter card details
        return view('payment.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Submit payment
        //Either fail and go back to enter card details
        //Or go to final page to final step of saving the order
        return redirect()->route('order.store');
    }
}
