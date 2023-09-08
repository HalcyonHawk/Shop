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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Submit payment
        //Either fail and go back to enter card details
        //Or go to final page to display order made and confirmed
    }
}
