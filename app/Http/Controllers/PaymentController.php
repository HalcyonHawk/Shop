<?php

namespace App\Http\Controllers;

use App\Services\CartService;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->cartService = new CartService;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Get total using service class
        $total = $this->cartService->getTotalPriceFromCart();

        //Enter card details form
        return view('payment.index', ['total' => $total]);
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
