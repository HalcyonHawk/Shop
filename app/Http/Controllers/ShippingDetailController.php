<?php

namespace App\Http\Controllers;

use App\Models\ShippingDetail;
use Illuminate\Http\Request;

class ShippingDetailController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Enter shipping details
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Store shipping details for the user
        //Then go to payment step (payment)
    }
}
